<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class agentzero {

	// categories
	public readonly ?string $type;
	public readonly ?string $category;

	// device
	public readonly ?string $vendor;
	public readonly ?string $device;
	public readonly ?string $model;
	public readonly ?string $build;

	// architecture
	public readonly ?string $processor;
	public readonly ?string $architecture;
	public readonly ?int $bits;

	// platform
	public readonly ?string $kernel;
	public readonly ?string $platform;
	public readonly ?string $platformversion;

	// browser
	public readonly ?string $engine;
	public readonly ?string $engineversion;
	public readonly ?string $browser;
	public readonly ?string $browserversion;
	public readonly ?string $language;

	// app
	public readonly ?string $app;
	public readonly ?string $appversion;
	public readonly ?string $url;

	// network
	public readonly ?string $proxy;

	/**
	 * Constructs a new AgentZero object, private because it can only be created internally
	 * 
	 * @param \stdClass $data A stdClass object containing the UA details
	 */
	private function __construct(\stdClass $data) {
		foreach (\array_keys(\get_class_vars(__CLASS__)) AS $key) {
			$this->{$key} = $data->{$key} ?? null;
		}
	}

	/**
	 * Retrieves calculated properties
	 * 
	 * @param string $key The name of the property to retrieve
	 * @return string|int|null The requested property or null if it doesn't exist
	 */
	public function __get(string $key) : string|int|null {
		switch ($key) {
			case 'host':
				if ($this->url !== null && ($host = \parse_url($this->url, PHP_URL_HOST)) !== null) {
					return \str_starts_with($host, 'www.') ? \substr($host, 4) : $host;
				}
				return null;
			case 'browsermajorversion':
			case 'enginemajorversion':
			case 'platformmajorversion':
			case 'appmajorversion':
				$item = \str_replace('major', '', $key);
				$value = $this->{$item} ?? null;
				return $value === null ? null : \intval(\substr($value, 0, \strspn($value, '0123456789')));
		}
		return $this->{$key} ?? null;
	}

	/**
	 * Extracts tokens from a UA string
	 * 
	 * @param string $ua The User Agent string to be tokenised
	 * @param array $config An array of configuration values
	 * @return array|false An array of tokens, or false if no tokens could be extracted
	 */
	protected static function getTokens(string $ua, array $config) : array|false {

		// prepare regexp
		$single = \implode('|', \array_map('preg_quote', $config['single']));
		$pattern = '/[^()\[\];\/ _-](?:(?<!'.$single.') (?!https?:\/\/)|[^()\[\];\/ ]*)*[^()\[\];\/ _-](?:\/[^;()\[\] ]++)?/i';

		// split up ua string
		if (\preg_match_all($pattern, $ua, $match)) {

			// remove ignore values
			$tokens = \array_diff($match[0], $config['ignore']);

			// special case for handling like
			foreach ($tokens AS $key => $item) {
				if (\str_starts_with($item, 'like ')) {

					// chop off words up to a useful token e.g. Platform/Version
					if (\str_contains($item, '/') && ($pos = \mb_strrpos($item, ' ')) !== false) {
						$tokens[$key] = \mb_substr($item, $pos + 1);

					// just remove the token
					} else {
						unset($tokens[$key]);
					}
				}
			}

			// rekey and return
			return \array_values($tokens);
		}
		return false;
	}

	/**
	 * Parses a User Agent string
	 * 
	 * @param string $ua The User Agent string to be parsed
	 * @return agentzero|false An agentzero object containing the parsed values of the input UA, or false if it could not be parsed
	 */
	public static function parse(string $ua) : agentzero|false {
		$config = config::get();
		if (($tokens = self::getTokens($ua, $config)) !== false) {

			// extract UA info
			$browser = new \stdClass();
			foreach ($config['match'] AS $key => $item) {
				$keylower = \mb_strtolower($key);
				foreach ($tokens AS $i => $token) {
					$tokenlower = \mb_strtolower($token);
					switch ($item['match']) {

						// match from start of string
						case 'start':
							if (\str_starts_with($tokenlower, $keylower)) {
								self::setProps($browser, $item['categories'], $token, $i, $tokens);
							}
							break;

						// match anywhere in the string
						case 'any':
							if (\str_contains($tokenlower, $keylower)) {
								self::setProps($browser, $item['categories'], $token, $i, $tokens);
							}
							break;

						// match anywhere in the string
						case 'exact':
							if ($tokenlower === $keylower) {
								self::setProps($browser, $item['categories'], $token, $i, $tokens);
								break; // don't match this token again
							}
							break;
					}
				}
			}
			return new agentzero($browser);
		}
		return false;
	}

	/**
	 * Sets parsed UA properties, and calls callbacks to generate properties and sets them to the output object
	 * 
	 * @param \stdClass $browser A stdClass object to which the properties will be set
	 * @param array|\Closure $props An array of properties or a Closure to generate properties
	 * @param string $value The current token value
	 * @param int $i The ID of the current token
	 * @param array $tokens The tokens array
	 * @return void
	 */
	protected static function setProps(\stdClass $browser, array|\Closure $props, string $value, int $i, array $tokens) : void {
		if ($props instanceof \Closure) {
			$props = $props($value, $i, $tokens);
		}
		if (\is_array($props)) {
			foreach ($props AS $key => $item) {
				if ($item !== null && !isset($browser->{$key})) {
					$browser->{$key} = $item;
				}
			}
		}
	}
}