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

							// callback
							if (isset($item['parser'])) {
								$item['parser']($part, $browser);

							// mapped categories
							} elseif (!empty($item['categories'])) {
								self::setProps($browser, $item['categories'], $part);
							}
							
							// process rest of string
							if (!empty($item['suffix'])) {
								foreach (\is_array($item['suffix']) ? $item['suffix'] : [$item['suffix']] AS $prop) {
									if (!isset($browser->{$prop})) {
										$len = \mb_strlen($key);
										$suffix = \mb_substr($part, $len, empty($item['suffixend']) || ($end = \mb_strpos($part, $item['suffixend'], $len)) === false ? null : $end - $len);
										if ($suffix) {
											$browser->{$prop} = \str_replace('_', '.', \explode(' ', $suffix, 1)[0]);
										}
										break;
									}
								}
							}
							break;
						}

					// match anywhere in the string
					} elseif ($item['match'] === 'any') {
						if (\str_contains($part, $key) && (empty($item['ignore']) || !\str_contains($part, $item['ignore']))) {
							
							// process rest of string
							if (!empty($item['suffix']) && \str_contains($part, $item['delimit']) && !isset($browser->{$item['suffix']})) {
								$tmp = \explode($item['delimit'], $part, 2);
								$part = $tmp[0];
								if (($suffix = $tmp[1] ?? $tokens[$i + 1] ?? null) !== null) {
									$browser->{$item['suffix']} = \str_replace('_', '.', \explode(' ', $suffix, 1)[0]);
								}
							}

							// callback
							if (isset($item['parser'])) {
								$item['parser']($part, $browser);

							// mapped categories
							} elseif (!empty($item['categories'])) {
								self::setProps($browser, $item['categories'], $part);
							}
							break;
						}

					// match anywhere in the string
					} elseif ($item['match'] === 'exact') {
						if ($key === $part) {

							// callback
							if (isset($item['parser'])) {
								$item['parser']($part, $browser);

							// mapped categories
							} elseif (!empty($item['categories'])) {
								self::setProps($browser, $item['categories'], $part);
							}
							break;
						}
					}
				}
			}
			return $browser;
		}
	}

	protected static function setProps(\stdClass $browser, array $props, string $value) : void {
		foreach ($props AS $key => $item) {
			foreach (\is_array($key) ? $key : [$key] AS $prop) {
				if (!isset($browser->{$prop})) {
					if (!($item instanceof \Closure)) {
						$browser->{$prop} = $item === true ? $value : $item;
					} elseif (($callback = $item($value)) !== null) {
						$browser->{$prop} = $callback;
					}
				}
			}
		}
	}
}