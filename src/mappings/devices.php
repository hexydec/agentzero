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
				'device' => $value,
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Microsoft',
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
					'device' => $parts[0].' '.$parts[1],
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
					'device' => $value,
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
			'Nintendo Wii U' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Wii U',
					'type' => 'human',
					'category' => 'console',
					'architecture' => 'PowerPC',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo WiiU' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Wii U',
					'type' => 'human',
					'category' => 'console',
					'architecture' => 'PowerPC',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo Wii' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Wii',
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo 3DS' => [
				'match' => 'exact',
				'categories' => [
					'device' => '3DS',
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo Switch' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Switch',
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Nintendo'
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
					'vendor' => 'Google',
					'device' => 'Chromecast',
					'model' => \explode(',', \mb_substr($value, 6), 2)[0]
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
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'device' => \mb_substr($value, 6)
				]
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
			'AmigaOneX1000' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'desktop',
					'device' => 'AmigaOneX1000'
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
						'device' => \mb_substr($parts[0], 8),
						'build' => $parts[1] ?? null,
						'type' => 'human',
						'category' => 'mobile',
						'vendor' => 'Samsung'
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
						'device' => \mb_substr($parts[0], 12),
						'build' => $parts[1] ?? null
					];
				}
			],
			'LGE' => [
				'match' => 'exact',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$device = $tokens[++$i] ?? null;
					$platformversion = $tokens[++$i] ?? null;
					$build = $tokens[++$i] ?? null;
					return [
						'type' => 'human',
						'category' => 'tv',
						'device' => $device,
						'build' => $build,
						'platformversion' => $platformversion,
						'vendor' => 'LG'
					];
				}
			],
			'NOKIA' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode('/', $value, 2);
					$device = \trim(\mb_substr($parts[0], 5, \str_ends_with($parts[0], ' Build') ? -6 : null));
					return [
						'type' => 'human',
						'category' => 'mobile',
						'vendor' => 'Nokia',
						'device' => $device !== '' ? $device : null,
						'build' => $parts[1] ?? null,
					];
				}
			],
			'Lumia' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'Nokia',
					'device' => $value
				]
			],
			'BRAVIA' => [
				'match' => 'start',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'vendor' => 'Sony'
				]
			],
			'TECNO' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'Tecno',
					'device' => \explode(' ', $value, 2)[1] ?? null
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
		$device = \explode('Build/', \str_ireplace('build/', 'Build/', $value), 2);
		$device[0] = \trim($device[0]);
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
			'Alcatel' => 'Alcatel',
			'Xiaomi' => 'Xiaomi',
			'Infinix' => 'Infinix',
			'Poco' => 'Poco',
			'Cubot' => 'Cubot'
		];
		$vendor = null;
		foreach ($vendors AS $key => $item) {
			if (($pos = \mb_stripos($value, $key)) !== false) {
				$vendor = $item;
				if ($pos === 0 && ($key === $item || $key === 'SonyEricsson')) {
					$device[0] = \trim(\mb_substr($device[0], \mb_strlen($key)), ' -_/');
				}
				break;
			}
		}
		return [
			'vendor' => $vendor === null ? null : self::getVendor($vendor),
			'device' => $device[0] === '' ? null : \ucwords($device[0]),
			'build' => $device[1] ?? null
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