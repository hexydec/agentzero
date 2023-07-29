<?php
namespace hexydec\agentzero;

class agentzero {

	protected static function getTokens(string $ua, array $ignore = []) : array|false {
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

	public static function detect(string $ua) : \stdClass|false {
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
			return $browser;
		}
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