<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class browsers {

	/**
	 * Generates a configuration array for matching browsers
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		$fn = [
			'browserslash' => function (string $value) : array {
				if (($browser = \mb_strrchr($value, ' ')) !== false) {
					$value = \ltrim($browser);
				}
				$parts = \explode('/', $value); // split more incase there are more slashes
				$map = [
					'opr' => 'Opera',
					'crios' => 'Chrome',
					'edg' => 'Edge',
					'edgios' => 'Edge',
					'webpositive' => 'WebPositive',
					'nintendobrowser' => 'NintendoBrowser',
					'samsungbrowser' => 'SamsungBrowser',
					'up.browser' => 'UP.Browser',
					'ucbrowser' => 'UCBrowser',
					'netfront' => 'NetFront',
					'seamonkey' => 'SeaMonkey',
					'icecat' => 'IceCat',
					'iceape' => 'IceApe',
					'iceweasel' => 'IceWeasel',
					'bonecho' => 'BonEcho',
					'palemoon' => 'PaleMoon',
					'k-meleon' => 'K-Meleon',
					'samsungbrowser' => 'Samsung Browser'
				];
				$data = ['type' => 'human'];
				$browser = \mb_strtolower(\array_shift($parts));
				$data['browser'] = $map[$browser] ?? \mb_convert_case($browser, MB_CASE_TITLE);
				$data['browserversion'] = null;
				foreach ($parts AS $item) {
					if (\strpbrk($item, '1234567890') !== false) {
						$data['browserversion'] = $item;
						break;
					}
				}
				return $data;
			},
			'presto' => function (string $value) : array {
				$parts = \explode('/', $value, 2);
				return [
					'type' => 'human',
					'browser' => $parts[0],
					'browserversion' => $parts[1] ?? null,
					'engine' => 'Presto',
					'engineversion' => $parts[1] ?? null
				];
			},
			'chromium' => function (string $value) : array {
				$parts = \explode('/', $value, 3);
				return [
					'type' => 'human',
					'browser' => \mb_convert_case($parts[0], MB_CASE_TITLE),
					'engine' => 'Blink',
					'browserversion' => $parts[1] ?? null,
					'engineversion' => isset($parts[1]) && \strspn($parts[1], '1234567890.') === \strlen($parts[1]) ? $parts[1] : null
				];
			}
		];
		return [
			'HeadlessChrome/' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'robot',
					'category' => 'crawler',
					'browser' => 'HeadlessChrome',
					'browserversion' => \mb_substr($value, 15)
				]
			],
			'IEMobile/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Opera Mini/' => [
				'match' => 'start',
				'categories' => $fn['presto']
			],
			'Opera/' => [
				'match' => 'start',
				'categories' => $fn['presto']
			],
			'OPR/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'CriOS/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Brave/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Vivaldi/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Maxthon/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Maxthon ' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'browser' => 'Maxthon',
					'browserversion' => \mb_substr($value, 8)
				]
			],
			'Konqueror/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'K-Meleon/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'UCBrowser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Waterfox/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'PaleMoon/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'IceWeasel/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'IceCat/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'IceApe/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Basilisk/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'SeaMonkey/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'UP.Browser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Netscape/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Thunderbird/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Galeon/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'WebPositive/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'K-Ninja/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'SamsungBrowser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'NintendoBrowser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Epiphany/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Silk/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'NetFront/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Dooble/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Falkon/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Namoroka/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Lynx/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'browser' => 'Lynx',
					'browserversion' => \explode('/', $value, 2)[1] ?? null,
					'engine' => 'Libwww',
					'type' => 'human',
					'category' => 'desktop'
				]
			],
			'Midori' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode('/', $value, 2);
					return [
						'type' => 'human',
						'browser' => 'Midori',
						'browserversion' => $parts[1] ?? \explode(' ', $value, 2)[1] ?? null
					];
				}
			],
			'PrivacyBrowser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Fennec/' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'browser' => 'Fennec',
					'engine' => 'Gecko',
					'browserversion' => \mb_substr($value, 7),
					'engineversion' => \mb_substr($value, 7)
				]
			],
			'Firefox/' =>  [
				'match' => 'start',
				'categories' => function (string $value) use ($fn) : array {
					$data = $fn['browserslash']($value);
					return \array_merge($data, [
						'engine' => 'Gecko',
						'engineversion' => $data['browserversion'] ?? null
					]);
				}
			],
			' Firefox/' =>  [
				'match' => 'any',
				'categories' => function (string $value) use ($fn) : array {
					$data = $fn['browserslash']($value);
					return \array_merge($data, [
						'engine' => 'Gecko',
						'engineversion' => $data['browserversion'] ?? null
					]);
				}
			],
			'Firefox' =>  [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'engine' => 'Gecko',
					'browser' => 'Firefox'
				]
			],
			'Minimo/' =>  [
				'match' => 'start',
				'categories' => function (string $value) use ($fn) : array {
					$data = $fn['browserslash']($value);
					return \array_merge($data, [
						'engine' => 'Gecko'
					]);
				}
			],
			'BonEcho/' =>  [
				'match' => 'start',
				'categories' => function (string $value) use ($fn) : array {
					$data = $fn['browserslash']($value);
					return \array_merge($data, [
						'engine' => 'Gecko'
					]);
				}
			],
			'Links/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Links' =>  [
				'match' => 'exact',
				'categories' => fn (string $value, int $i, array $tokens) => [
					'type' => 'human',
					'browser' => $value,
					'browserversion' => $tokens[$i + 1]
				]
			],
			'Elinks/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'ELinks' =>  [
				'match' => 'exact',
				'categories' => fn (string $value, int $i, array $tokens) => [
					'type' => 'human',
					'browser' => $value,
					'browserversion' => $tokens[$i + 1]
				]
			],
			'Edg/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Edge/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'EdgiOS/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'MSIE ' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'browser' => 'Internet Explorer',
					'browserversion' => \mb_substr($value, 5),
					'engine' => 'Trident'
				]
			],
			'Cronet/' => [
				'match' => 'start',
				'categories' => $fn['chromium']
			],
			'Chromium/' => [
				'match' => 'start',
				'categories' => $fn['chromium']
			],
			'Chrome/' => [
				'match' => 'start',
				'categories' => $fn['chromium']
			],
			'Safari/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Mozilla/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'rv:' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'browserversion' => \mb_substr($value, 3)
				]
			]
		];
	}
}