<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class agentzero {

	private function __construct(protected \stdClass $data) {

	}

	public function __get(string $key) : string|int|null {
		switch ($key) {
			case 'host':
				if (!empty($this->data->url)) {
					$host = \parse_url($this->data->url, PHP_URL_HOST);
					return \str_starts_with($host, 'www.') ? \substr($host, 4) : $host;
				}
				return null;
			case 'browsermajorversion':
			case 'enginemajorversion':
			case 'platformmajorversion':
			case 'appmajorversion':
				$item = \str_replace('major', '', $key);
				return empty($this->data->{$item}) ? null : \strspn($this->data->{$item}, '0123456789');
		}
		return $this->data->{$key} ?? null;
	}

	public function toArray() : array {
		return (array) $this->data;
	}

	protected static function getTokens(string $ua, array $ignore = []) : array|false {

		// check for unicode
		if (\str_contains($ua, '\\x')) {
			$ua = \preg_replace_callback('/\\\\x([0-9a-f]{2})/i', fn (array $chr) : string => \chr(\hexdec($chr[1])), $ua);
		}

		// split up ua string
		$pattern = '/([^(]*)(?:\(((?:\([^)]++\)|[^()]++)++)\))?/i';
		if (\preg_match_all($pattern, $ua, $match, PREG_SET_ORDER)) {

			// extract and clean tokens
			$tokens = [];
			foreach ($match AS $item) {
				for ($i = 1; $i <= 2; $i++) {
					$item[$i] = \trim($item[$i] ?? '');
					if ($item[$i]) {
						$trim = function (string $value) : string {
							return \trim($value, ' ;');
						};
						$tokens = \array_merge($tokens, \array_map($trim, \explode($i === 1 ? ' ' : ';', $item[$i])));
					}
				}
			}

			// special case for 'like'
			if (\in_array('like', $tokens)) {
				$remove = false;
				foreach ($tokens AS $key => $item) {
					if ($item === 'like') {
						$remove = true;
					} elseif ($remove && !\str_contains($item, '/')) {
						unset($tokens[$key]);
					} else {
						$remove = false;
					}
				}
			}

			// remove generic tokens
			$tokens = \array_diff($tokens, $ignore);
			return \array_values($tokens);
		}
		return false;
	}

	public static function parse(string $ua) : agentzero|false {
		$config = config::get();
		if (($tokens = self::getTokens($ua, $config['ignore'])) !== false) {

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