<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class devices {

	/**
	 * Generates a configuration array for matching devices
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		$fn = [
			'ios' => function (string $value, int $i, array $tokens) : array {
				$version = null;
				$model = null;
				foreach ($tokens AS $item) {
					if (\str_starts_with($item, 'Mobile/')) {
						$model = \mb_substr($item, 7);
					} elseif (\str_starts_with($item, 'CPU iPhone OS ')) {
						$version = \str_replace('_', '.', \mb_substr($item, 14, \mb_strpos($item, ' ', 14) - 14));
					} elseif (\str_starts_with($item, 'CPU OS ')) {
						$version = \str_replace('_', '.', \mb_substr($item, 7, \mb_strpos($item, ' ', 7) - 7));
					}
				}
				return [
					'type' => 'human',
					'category' => $value === 'iPad' ? 'tablet' : 'mobile',
					'architecture' => 'arm',
					'bits' => $value === 'iPod' ? 32 : 64,
					'kernel' => 'Linux',
					'platform' => 'iOS',
					'platformversion' => $version,
					'vendor' => 'Apple',
					'device' => $value,
					'model' => $model
				];
			},
			'xbox' => fn (string $value) : array => [
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Microsoft',
				'device' => 'Xbox',
				'model' => ($model = \mb_substr($value, 5)) === '' ? null : $model
			],
			'playstation' => function (string $value) : array {
				$parts = \explode(' ', $value);
				if (\str_contains($parts[1], '/')) {
					list($parts[1], $parts[2]) = \explode('/', $parts[1]);
				}
				$platform = [
					4 => 'Orbis OS',
					5 => 'FreeBSD'
				];
				return [
					'device' => $parts[0],
					'model' => $parts[1] ?? null,
					'kernel' => 'Linux',
					'platform' => $platform[\intval($parts[1])] ?? null,
					'platformversion' => $parts[2] ?? null,
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Sony',
					'processor' => 'AMD',
					'architecture' => 'x86',
					'bits' => 64
				];
			},
			'firetablet' => fn (string $value) : array => [
				'type' => 'human',
				'category' => 'tablet',
				'vendor' => 'Amazon',
				'device' => 'Fire Tablet',
				'model' => $value
			]
		];
		return [
			'iPhone' => [
				'match' => 'exact',
				'categories' => $fn['ios']
			],
			'iPad' => [
				'match' => 'exact',
				'categories' => $fn['ios']
			],
			'iPod' => [
				'match' => 'exact',
				'categories' => $fn['ios']
			],
			'iPod touch' => [
				'match' => 'exact',
				'categories' => $fn['ios']
			],
			'Macintosh' => [
				'match' => 'exact',
				'categories' => [
					'vendor' => 'Apple',
					'device' => 'Macintosh'
				]
			],
			'Quest' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'vendor' => 'Oculus',
					'device' => 'Quest',
					'model' => ($model = \mb_substr($value, 6)) === '' ? null : $model,
					'type' => 'human',
					'category' => 'vr'
				]
			],
			'Pacific' => [
				'match' => 'start',
				'categories' => [
					'vendor' => 'Oculus',
					'device' => 'Go',
					'type' => 'human',
					'category' => 'vr'
				]
			],
			// 'Nintendo Wii U' => [
			// 	'match' => 'exact',
			// 	'categories' => [
			// 		'device' => 'Wii U',
			// 		'type' => 'human',
			// 		'category' => 'console',
			// 		'architecture' => 'PowerPC',
			// 		'vendor' => 'Nintendo'
			// 	]
			// ],
			// 'Nintendo WiiU' => [
			// 	'match' => 'exact',
			// 	'categories' => [
			// 		'device' => 'Wii U',
			// 		'type' => 'human',
			// 		'category' => 'console',
			// 		'architecture' => 'PowerPC',
			// 		'vendor' => 'Nintendo'
			// 	]
			// ],
			// 'Nintendo Wii' => [
			// 	'match' => 'exact',
			// 	'categories' => [
			// 		'device' => 'Wii',
			// 		'type' => 'human',
			// 		'category' => 'console',
			// 		'vendor' => 'Nintendo'
			// 	]
			// ],
			// 'Nintendo 3DS' => [
			// 	'match' => 'exact',
			// 	'categories' => [
			// 		'device' => '3DS',
			// 		'type' => 'human',
			// 		'category' => 'console',
			// 		'vendor' => 'Nintendo'
			// 	]
			// ],
			// 'Nintendo Switch' => [
			// 	'match' => 'exact',
			// 	'categories' => [
			// 		'device' => 'Switch',
			// 		'type' => 'human',
			// 		'category' => 'console',
			// 		'vendor' => 'Nintendo'
			// 	]
			// ],
			'Nintendo' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Nintendo',
					'device' => $value === 'Nintendo WiiU' ? 'Wii U' : \mb_substr($value, 9),
					'architecture' => \str_ends_with($value, 'U') ? 'PowerPC' : null
				]
			],
			'Xbox Series S' => [
				'match' => 'exact',
				'categories' => $fn['xbox']
			],
			'Xbox Series X' => [
				'match' => 'exact',
				'categories' => $fn['xbox']
			],
			'Xbox One' => [
				'match' => 'exact',
				'categories' => $fn['xbox']
			],
			'Xbox 360' => [
				'match' => 'exact',
				'categories' => $fn['xbox']
			],
			'Xbox' => [
				'match' => 'exact',
				'categories' => $fn['xbox']
			],
			'Playstation 4' => [
				'match' => 'start',
				'categories' => $fn['playstation']
			],
			'Playstation 5' => [
				'match' => 'start',
				'categories' => $fn['playstation']
			],
			'SHIELD Android TV' => [
				'match' => 'start',
				'categories' => [
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'NVIDIA',
					'device' => 'Shield'
				]
			],
			'CrKey/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'tv',
					'app' => 'Chromecast',
					'appversion' => \explode(',', \mb_substr($value, 6), 2)[0]
				]
			],
			'ChromeBook' => [
				'match' => 'any',
				'categories' => [
					'type' => 'human',
					'category' => 'desktop'
				]
			],
			'GoogleTV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'device' => 'GoogleTV'
				]
			],
			'CriKey/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'tv',
					'device' => 'Chromecast',
					'vendor' => 'Google',
					'platformversion' => \mb_substr($value, 7)
				]
			],
			'Apple/' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$value = \mb_substr($value, 6);
					$split = \strcspn($value, '0123456789');
					$device = \mb_substr($value, 0, $split);
					return [
						'type' => 'human',
						'category' => $device === 'iPad' ? 'tablet' : 'mobile',
						'vendor' => 'Apple',
						'device' => $device,
						'model' => \mb_substr($value, $split) ?: null
					];
				}
			],
			'iPhone/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'platform' => 'iOS',
					'platformversion' => \mb_substr($value, 7),
					'vendor' => 'Apple',
					'device' => 'iPhone'
				]
			],
			'hw/iPhone' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'platform' => 'iOS',
					'vendor' => 'Apple',
					'device' => 'iPhone',
					'model' => \str_replace('_', '.', \mb_substr($value, 9))
				]
			],
			'KFT' => [
				'match' => 'start',
				'categories' => $fn['firetablet']
			],
			'KFO' => [
				'match' => 'start',
				'categories' => $fn['firetablet']
			],
			'KFM' => [
				'match' => 'start',
				'categories' => $fn['firetablet']
			],
			'AFT' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'tv',
					'vendor' => 'Amazon',
					'device' => 'Fire TV',
					'model' => $value
				]
			],
			'Roku/' => [
				'match' => 'start',
				'categories' => fn (string $value, int $i, array $tokens) : array => [
					'type' => 'human',
					'category' => 'tv',
					'kernel' => 'Linux',
					'platform' => 'Roku OS',
					'platformversion' => \mb_substr($value, 5),
					'vendor' => 'Roku',
					'device' => 'Roku',
					'build' => $tokens[++$i] ?? null
				]
			],
			'AmigaOneX' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'desktop',
					'vendor' => 'A-Eon Technology',
					'device' => 'AmigaOne',
					'model' => \mb_substr($value, 8)
				]
			],
			'googleweblight' => [
				'match' => 'exact',
				'categories' => [
					'proxy' => 'googleweblight'
				]
			],
			'SAMSUNG-' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode('/', $value, 2);
					return [
						'type' => 'human',
						'category' => 'mobile',
						'vendor' => 'Samsung',
						'model' => \mb_substr($parts[0], 8),
						'build' => $parts[1] ?? null,
					];
				}
			],
			'Samsung' => [
				'match' => 'start',
				'categories' => fn (string $value) : ?array => \str_starts_with($value, 'SamsungBrowser') ? null : [
					'vendor' => 'Samsung'
				]
			],
			'Acer' => [
				'match' => 'start',
				'categories' => [
					'vendor' => 'Acer'
				]
			],
			'SonyEricsson' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode('/', $value, 2);
					return [
						'type' => 'human',
						'category' => 'mobile',
						'vendor' => 'Sony Ericsson',
						'model' => \mb_substr($parts[0], 12),
						'build' => $parts[1] ?? null
					];
				}
			],
			'LGE' => [
				'match' => 'exact',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$device = $tokens[++$i] ?? null;
					$platformversion = empty($tokens[++$i]) ? null : \mb_substr(\explode(' ', $tokens[$i])[0], 5);
					$build = $tokens[++$i] ?? null;
					return [
						'type' => 'human',
						'category' => 'tv',
						'model' => $device,
						'build' => $build,
						'platformversion' => $platformversion,
						'vendor' => 'LG'
					];
				}
			],
			'NOKIA' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					return \array_merge(devices::getDevice($value), [
						'type' => 'human',
						'category' => 'mobile',
						'vendor' => 'Nokia',
					]);
				}
			],
			'Lumia' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => \array_merge(devices::getDevice($value), [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'Nokia'
				])
			],
			'BRAVIA' => [
				'match' => 'start',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'vendor' => 'Sony',
					'device' => 'Bravia'
				]
			],
			'TECNO' => [
				'match' => 'start',
				'categories' => fn (string $value) : array =>  [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'Tecno',
					'model' => \explode(' ', \str_replace('-', ' ', $value), 2)[1] ?? null
				]
			],
			'ThinkPad' => [
				'match' => 'start',
				'categories' => function (string $value, int $i, array $tokens) : array {
					if (\mb_strpos($tokens[++$i] ?? '', 'Build/') === 0) {
						$device = \explode('_', \mb_substr($tokens[$i], 6));
					}
					return [
						'type' => 'human',
						'vendor' => 'Lenovo',
						'device' => $device[0] ?? null,
						'model' => $device[1] ?? null,
						'build' => $device[2] ?? null
					];
				}
			],
			'Model/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'model' => \mb_substr($value, 6)
				]
			],
			'Build/' => [
				'match' => 'any',
				'categories' => fn (string $value) : array => self::getDevice($value)
			],
			'x' => [
				'match' => 'any',
				'categories' => function (string $value) : ?array {
					$parts = \explode('x', $value);
					if (!isset($parts[2]) && \is_numeric($parts[0]) && \is_numeric($parts[1])) {
						return [
							'width' => \intval($parts[0]),
							'height' => \intval($parts[1])
						];
					}
					return null;
				}
			]
		];
	}

	/**
	 * Extracts device information from a token
	 * 
	 * @param string $value A token expected to contain device information
	 * @return array<string,string|null> An array containing the extracted devices information
	 */
	public static function getDevice(string $value) : array {
		foreach (['Mobile', 'Tablet', 'Safari', 'AppleWebKit', 'Linux', 'rv:'] AS $item) {
			if (\mb_stripos($value, $item) === 0) {
				return [];
			}
		}
		$parts = \explode('Build/', \str_ireplace('build/', 'Build/', $value), 2);
		$parts[0] = \trim($parts[0]);
		$build = $parts[1] ?? null;
		$vendors = [
			'Samsung' => 'Samsung',
			'OnePlus' => 'OnePlus',
			'Oppo' => 'Oppo',
			'CPH' =>'OnePlus',
			'KB' => 'OnePlus',
			'Pixel' => 'Google',
			'SM-' => 'Samsung',
			'LM-' => 'LG',
			'LG' => 'LG',
			'RealMe' => 'RealMe',
			'RMX' => 'RealMe',
			'HTC' => 'HTC',
			'Nexus' => 'Google',
			'MI ' => 'Xiaomi',
			'HM ' => 'Xiaomi',
			'Huawei' => 'Huawei',
			'Honor' => 'Honor',
			'Motorola' => 'Motorola',
			'moto' => 'Motorola',
			'Intel' => 'Intel',
			'SonyEricsson' => 'Sony Ericsson',
			'Tecno' => 'Tecno',
			'Vivo' => 'Vivo',
			'Huawei' => 'Huawei',
			'Oppo' => 'Oppo',
			'Asus' => 'Asus',
			'Acer' => 'Acer',
			'Alcatel' => 'Alcatel',
			'Xiaomi' => 'Xiaomi',
			'Infinix' => 'Infinix',
			'Poco' => 'Poco',
			'Cubot' => 'Cubot',
			'Nokia' => 'Nokia'
		];

		// find vendor
		$vendor = null;
		foreach ($vendors AS $key => $item) {
			if (($pos = \mb_stripos($value, $key)) !== false) {
				$vendor = $item;

				// remove vendor name
				if ($pos === 0 && ($key === $item || $key === 'SonyEricsson')) {
					$parts[0] = \trim(\mb_substr($parts[0], \mb_strlen($key)), ' -_/');
				}
				break;
			}
		}
		$model = \explode(' ', $parts[0], 2);
		$device = $model[0] !== '' && \ctype_alpha($model[0]) ? \ucfirst($model[0]) : null; // device name if only letters
		$model = $device === null ? \implode(' ', $model) : ($model[1] ?? null); // reconstruct remainder of device name

		// remove everything after a slash
		if ($build === null && \str_contains($model ?? '', '/')) {
			$model = \mb_strstr($model, '/', true);
		}

		// special case for SMART TV
		if (\strcasecmp($device.$model, 'smarttv') === 0) {
			$device = 'Smart TV';
			$model = null;
		}
		// var_dump($value, $parts, $device, $model);
		return [
			'vendor' => $vendor === null ? null : self::getVendor($vendor),
			'device' => $device,
			'model' => $model ? \ucwords($model) : null,
			'build' => $build
		];
	}

	public static function getVendor(string $value) : string {
		$map = [
			'oneplus' => 'OnePlus',
			'lg' => 'LG',
			'lge' => 'LG',
			'realme' => 'RealMe',
			'htc' => 'HTC',
			'sonyericsson' => 'Sony Ericsson',
			'tcl' => 'TCL',
			'zte' => 'ZTE',
			'hmd' => 'HMD',
			'lt' => 'LT'
		];
		$value = \mb_strtolower($value);
		return $map[$value] ?? \mb_convert_case($value, MB_CASE_TITLE);
	}
}