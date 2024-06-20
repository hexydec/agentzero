<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class agentzero {

	// ua string
	public readonly string $string;

	// categories
	public readonly ?string $type;
	public readonly ?string $category;

	// device
	public readonly ?string $vendor;
	public readonly ?string $device;
	public readonly ?string $model;
	public readonly ?string $build;
	public readonly ?int $ram;

	// architecture
	public readonly ?string $processor;
	public readonly ?string $architecture;
	public readonly ?int $bits;
	public readonly ?string $cpu;
	public readonly ?int $cpuclock;

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
	public readonly ?string $appname;
	public readonly ?string $appversion;
	public readonly ?string $framework;
	public readonly ?string $frameworkversion;
	public readonly ?string $url;

	// network
	public readonly ?string $nettype;
	public readonly ?string $proxy;

	// screen
	public readonly ?int $width;
	public readonly ?int $height;
	public readonly ?int $dpi;
	public readonly ?float $density;
	public readonly ?bool $darkmode;

	/**
	 * Constructs a new AgentZero object, private because it can only be created internally
	 * 
	 * @param \stdClass $data A stdClass object containing the UA details
	 */
	private function __construct(string $ua, \stdClass $data) {
		$this->string = $ua;

		// categories
		$this->type = $data->type ?? null;
		$this->category = $data->category ?? null;

		// device
		$this->vendor = $data->vendor ?? null;
		$this->device = $data->device ?? null;
		$this->model = $data->model ?? null;
		$this->build = $data->build ?? null;
		$this->ram = $data->ram ?? null;

		// architecture
		$this->processor = $data->processor ?? null;
		$this->architecture = $data->architecture ?? null;
		$this->bits = $data->bits ?? null;
		$this->cpu = $data->cpu ?? null;
		$this->cpuclock = $data->cpuclock ?? null;

		// platform
		$this->kernel = $data->kernel ?? null;
		$this->platform = $data->platform ?? null;
		$this->platformversion = $data->platformversion ?? null;

		// browser
		$this->engine = $data->engine ?? null;
		$this->engineversion = $data->engineversion ?? null;
		$this->browser = $data->browser ?? null;
		$this->browserversion = $data->browserversion ?? null;
		$this->language = $data->language ?? null;

		// app
		$this->app = $data->app ?? null;
		$this->appname = $data->appname ?? null;
		$this->appversion = $data->appversion ?? null;
		$this->framework = $data->framework ?? null;
		$this->frameworkversion = $data->frameworkversion ?? null;
		$this->url = $data->url ?? null;

		// network
		$this->nettype = $data->nettype ?? null;
		$this->proxy = $data->proxy ?? null;

		// screen
		$this->width = $data->width ?? null;
		$this->height = $data->height ?? null;
		$this->dpi = $data->dpi ?? null;
		$this->density = $data->density ?? null;
		$this->darkmode = $data->darkmode ?? null;
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
				if ($this->url !== null && ($host = \parse_url($this->url, PHP_URL_HOST)) !== false && $host !== null) {
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
	 * @param array<string> $single An array of strings that can appear on their own, enables the tokens to be split correctly
	 * @param array<string> $ignore An array of tokens that can be ignored in the UA string
	 * @return false|array<int,string> An array of tokens, or false if no tokens could be extracted
	 */
	protected static function getTokens(string $ua, array $single, array $ignore) : array|false {

		// prepare regexp
		$single = \implode('|', \array_map('\\preg_quote', $single, \array_fill(0, \count($single), '/')));
		$pattern = '/\{[^}]++\}|[^()\[\];,\/  _-](?:(?<!'.$single.') (?!https?:\/\/)|(?<=[a-z])\([^)]+\)|[^()\[\];,\/ ]*)*[^()\[\];,\/  _-](?:\/[^;,()\[\]  ]++)?|[0-9]/i';

		// split up ua string
		if (\preg_match_all($pattern, $ua, $match)) {

			// userland token processing
			$tokens = [];
			foreach ($match[0] AS $key => $item) {
				$lower = \mb_strtolower($item);

				// special case for handling like
				if (\str_starts_with($lower, 'like ')) {

					// chop off words up to a useful token e.g. Platform/Version
					if (\str_contains($item, '/') && ($pos = \mb_strrpos($item, ' ')) !== false) {
						$tokens[$key] = \mb_substr($item, $pos + 1);
					}

				// check token is not ignored
				} elseif (!\in_array($lower, $ignore, true)) {
					$tokens[$key] = $item;
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
		if (($config = config::get()) === null) {

		} elseif (($tokens = self::getTokens($ua, $config['single'], $config['ignore'])) !== false) {

			// extract UA info
			$browser = new \stdClass();
			$tokenslower = \array_map('mb_strtolower', $tokens);
			foreach ($config['match'] AS $key => $item) {
				$item->match($browser, $key, $tokens, $tokenslower);
			}
			return new agentzero($ua, $browser);
		}
		return false;
	}
}