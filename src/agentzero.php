<?php
namespace hexydec\agentzero;

class agentzero {

	protected static ?array $config = null;

	protected static function getConfig() {
		if (self::$config === null) {
			self::$config = config::get();
		}
		return self::$config;
	}

	protected static function getTokens(string $ua) : array|false {
		$pattern = '/([^(]*)(?:\(([^)]++)\))?/i';
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

			// remove generic tokens
			$tokens = \array_diff($tokens, self::$config['ignore']);
			return $tokens;
		}
		return false;
	}

	public static function detect(string $ua) : \stdClass|false {
		$config = self::getConfig();
		if (($tokens = self::getTokens($ua)) !== false) {

			// extract UA info
			$browser = new \stdClass();
			foreach ($config['match'] AS $key => $item) {
				foreach ($tokens AS $i => $part) {

					// match from start of string and extract item and version
					if ($item['match'] === 'start') {
						if (\str_starts_with($part, $key)) {
							self::setProps($browser, $item['categories'], $part, $tokens);
							break;
						}

					// match anywhere in the string
					} elseif ($item['match'] === 'any') {
						if (\str_contains($part, $key)) {
							self::setProps($browser, $item['categories'], $part, $tokens);
							break;
						}

					// match anywhere in the string
					} elseif ($item['match'] === 'exact') {
						if ($key === $part) {
							self::setProps($browser, $item['categories'], $part, $tokens);
							break;
						}
					}
				}
			}
			return $browser;
		}
	}

	protected static function setProps(\stdClass $browser, array|\Closure $props, string $value, array $tokens) : void {
		if ($props instanceof \Closure) {
			$props = $props($value, $tokens);
		}
		if (\is_array($props)) {
			foreach ($props AS $key => $item) {
				if (!isset($browser->{$key}) && $item !== null) {
					$browser->{$key} = $item;
				}
			}
		}
	}
}