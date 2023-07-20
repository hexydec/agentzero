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

	public static function detect(string $ua) : \stdClass|false {
		$config = self::getConfig();
		$pattern = '/([^(]*)(?:\(([^)]++)\))?/i';
		if (\preg_match_all($pattern, $ua, $match, PREG_SET_ORDER)) {

			// extract and clean tokens
			$parts = [];
			foreach ($match AS $item) {
				for ($i = 1; $i <= 2; $i++) {
					$item[$i] = \trim($item[$i] ?? '');
					if ($item[$i]) {
						$parts = \array_merge($parts, \array_map('trim', \explode($i === 1 ? ' ' : ';', $item[$i])));
					}
				}
			}

			// remove generic tokens
			$parts = \array_diff($parts, $config['ignore']);

			// extract UA info
			$browser = new \stdClass();
			foreach ($config['match'] AS $key => $item) {
				foreach ($parts AS $i => $part) {

					// match from start of string and extract item and version
					if ($item['match'] === 'start') {
						if (\str_starts_with($part, $key)) {
							foreach ($item['categories'] AS $cat => $value) {
								if (!isset($browser->{$cat})) {
									$browser->{$cat} = $value;
								}
							}
							
							// process rest of string
							if (!empty($item['suffix']) && !isset($browser->{$item['suffix']})) {
								$suffix = \mb_substr($part, \mb_strlen($key));
								if ($suffix) {
									$browser->{$item['suffix']} = \str_replace('_', '.', \explode(' ', $suffix, 1)[0]);
								}
							}
							break;
						}

					// match anywhere in the string
					} elseif ($item['match'] === 'any') {
						if (\str_contains($part, $key)) {
							
							// process rest of string
							if (!empty($item['suffix'])) {
								$tmp = \explode($item['delimit'], $part, 2);
								$key = $tmp[0];
								if (($suffix = $tmp[1] ?? $parts[$i + 1] ?? null) !== null) {
									$browser->{$item['suffix']} = \str_replace('_', '.', \explode(' ', $suffix, 1)[0]);
								}
							}

							// callback
							if (isset($item['parser'])) {
								$item['parser']($part, $browser);

							// mapped categories
							} elseif (!empty($item['categories'])) {
								foreach ($item['categories'] AS $cat => $value) {
									if (!isset($browser->{$cat})) {
										$browser->{$cat} = $value === true ? $key : $value;
									}
								}
							}
							break;
						}

					// match anywhere in the string
					} elseif ($item['match'] === 'exact') {
						if ($key === $part) {

							// set values
							foreach ($item['categories'] AS $cat => $value) {
								if (!isset($browser->{$cat})) {
									$browser->{$cat} = $value;
								}
							}
							break;
						}
					}
				}
			}
			return $browser;
		}
	}
}