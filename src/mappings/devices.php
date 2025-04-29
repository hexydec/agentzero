<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class devices {

	/**
	 * Generates a configuration array for matching devices
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		$fn = [
			'ios' => function (string $value, int $i, array $tokens) : array {
				$version = null;
				$model = null;

				// device name with slash like iPhone/16.5
				$parts = \explode('/', $value, 3);
				if (isset($parts[1])) {
					$value = $parts[0];
					$version = $parts[1];
				}

				// look at other tokens to gather info
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
					'architecture' => 'Arm',
					'bits' => $value === 'iPod' ? 32 : 64,
					'kernel' => 'Linux',
					'platform' => 'iOS',
					'platformversion' => $version,
					'vendor' => 'Apple',
					'device' => \mb_stripos($value, 'iPhone') === 0 ? 'iPhone' : $value,
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
					'4' => 'Orbis OS',
					'5' => 'FreeBSD'
				];
				return [
					'device' => 'PlayStation',
					'model' => $parts[1] ?? null,
					'kernel' => 'Linux',
					'platform' => $platform[$parts[1]] ?? null,
					'platformversion' => $parts[2] ?? null,
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Sony',
					'processor' => 'AMD',
					'architecture' => 'x86',
					'bits' => 64
				];
			},
			'firetablet' => function (string $value) : ?array {
				$model = \explode(' ', $value)[0];
				if (\ctype_alpha($model) && \mb_strlen($model) <= 7) {
					return [
						'type' => 'human',
						'category' => 'tablet',
						'vendor' => 'Amazon',
						'device' => 'Fire Tablet',
						'model' => $model
					];
				}
				return null;
			}
		];
		return [
			'iPhone' => new props('start', $fn['ios']),
			'iPad' => new props('exact', $fn['ios']),
			'iPod' => new props('exact', $fn['ios']),
			'iPod touch' => new props('exact', $fn['ios']),
			'Macintosh' => new props('exact', [
				'vendor' => 'Apple',
				'device' => 'Macintosh'
			]),
			'Quest' => new props('start', fn (string $value) : array => [
				'vendor' => 'Oculus',
				'device' => 'Quest',
				'model' => ($model = \mb_substr($value, 6)) === '' ? null : $model,
				'type' => 'human',
				'category' => 'vr'
			]),
			'Pacific' => new props('start', [
				'vendor' => 'Oculus',
				'device' => 'Go',
				'type' => 'human',
				'category' => 'vr'
			]),
			'Nintendo' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Nintendo',
				'device' => $value === 'Nintendo WiiU' ? 'Wii U' : \mb_substr($value, 9),
				'architecture' => \str_ends_with($value, 'U') ? 'PowerPC' : null
			]),
			'Xbox Series S' => new props('exact', $fn['xbox']),
			'Xbox Series X' => new props('exact', $fn['xbox']),
			'Xbox One' => new props('exact', $fn['xbox']),
			'Xbox 360' => new props('exact', $fn['xbox']),
			'Xbox' => new props('exact', $fn['xbox']),
			'Playstation 3' => new props('start', $fn['playstation']),
			'Playstation 4' => new props('start', $fn['playstation']),
			'Playstation 5' => new props('start', $fn['playstation']),
			'Playstation Vita' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Sony',
				'device' => 'PlayStation',
				'model' => 'Vita',
				'architecture' => 'Arm',
				'processor' => 'MediaTek',
				'cpu' => 'Cortex-A9 MPCore',
				'bits' => 32,
				'width' => 960,
				'height' => 544,
				'dpi' => 220,
				'ram' => 512,
				'kernel' => 'Linux',
				'platform' => 'PlayStation Vita System Software',
				'platformversion' => \mb_substr($value, 17)
			]),
			'Playstation Portable' => new props('start', fn (string $value, int $i, array $tokens) : array => [
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Sony',
				'device' => 'PlayStation',
				'model' => 'PSP',
				'architecture' => 'Arm',
				'cpu' => 'MIPS R4000',
				'cpuclock' => 333,
				'bits' => 64,
				'width' => 480,
				'height' => 272,
				'ram' => 64,
				'kernel' => 'Linux',
				'platform' => 'PlayStation Portable System Software',
				'platformversion' => $tokens[++$i],
				'browser' => 'NetFront',
				'engine' => 'WebKit'
			]),
			'SHIELD Android TV' => new props('start', [
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'NVIDIA',
				'device' => 'Shield'
			]),
			'CrKey/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'tv',
				'app' => 'Chromecast',
				'appname' => 'CrKey',
				'appversion' => \explode(',', \mb_substr($value, 6), 2)[0]
			]),
			'ChromeBook' => new props('any', [
				'type' => 'human',
				'category' => 'desktop'
			]),
			'GoogleTV' => new props('exact', [
				'type' => 'human',
				'category' => 'tv',
				'device' => 'GoogleTV'
			]),
			'CriKey/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'tv',
				'device' => 'Chromecast',
				'vendor' => 'Google',
				'platformversion' => \mb_substr($value, 7)
			]),
			'Apple/' => new props('start', function (string $value) : array {
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
			}),
			'hw/iPhone' => new props('start', fn (string $value) : array => [
				'platform' => 'iOS',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => \str_replace('_', '.', \mb_substr($value, 9))
			]),
			'KF' => new props('start', $fn['firetablet']),
			'AFT' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'Amazon',
				'device' => 'Fire TV',
				'model' => $value
			]),
			'Roku/' => new props('start', fn (string $value, int $i, array $tokens) : array => [
				'type' => 'human',
				'category' => 'tv',
				'kernel' => 'Linux',
				'platform' => 'Roku OS',
				'platformversion' => $tokens[++$i] ?? null,
				'vendor' => 'Roku',
				'device' => \mb_substr($value, 5)
			]),
			'AmigaOneX' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'desktop',
				'vendor' => 'A-Eon Technology',
				'device' => 'AmigaOne',
				'model' => \mb_substr($value, 8)
			]),
			'googleweblight' => new props('exact', [
				'proxy' => 'googleweblight'
			]),
			'SAMSUNG-' => new props('start', function (string $value) : array {
				$parts = \explode('/', $value, 2);
				return [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'Samsung',
					'model' => \mb_substr($parts[0], 8),
					'build' => $parts[1] ?? null,
				];
			}),
			'Samsung' => new props('start', fn (string $value) : ?array => \str_starts_with($value, 'SamsungBrowser') ? null : [
				'vendor' => 'Samsung'
			]),
			'SM-' => new props('start', function (string $value) : array {
				$parts = \explode('.', \explode(' ', $value)[0]);
				return [
					'vendor' => 'Samsung',
					'model' => $parts[0],
					'build' => $parts[1] ?? null
				];
			}),
			'Acer' => new props('start', [
				'vendor' => 'Acer'
			]),
			'SonyEricsson' => new props('start', function (string $value) : array {
				$parts = \explode('/', $value, 2);
				return [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'Sony Ericsson',
					'model' => \mb_substr($parts[0], 12),
					'build' => $parts[1] ?? null
				];
			}),
			'LGE' => new props('exact', function (string $value, int $i, array $tokens) : array {
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
			}),
			'LG-' => new props('start', function (string $value) : array {
				$parts = \explode('/', \mb_substr($value, 3), 3);
				return [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'LG',
					'model' => \explode(' ', $parts[0])[0],
					'build' => $parts[1] ?? null
				];
			}),
			'NOKIA' => new props('start', fn (string $value) : array => \array_merge(devices::getDevice($value), [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Nokia',
			])),
			'Lumia' => new props('start', fn (string $value) : array => \array_merge(devices::getDevice($value), [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Nokia'
			])),
			'BRAVIA' => new props('start', [
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'Sony',
				'device' => 'Bravia'
			]),
			'TECNO' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Tecno',
				'model' => \explode(' ', \str_replace('-', ' ', $value), 2)[1] ?? null
			]),
			'Xiaomi' => new props('start', function (string $value, int $i, array $tokens) : array {
				return [
					'type' => 'human',
					'vendor' => 'Xiaomi',
					'device' => \mb_stripos($value, 'Poco') !== false ? 'Poco' : null,
					'model' => \mb_stripos($value, 'Xiaomi-Mi') !== 0 ? (\explode(' ', $value)[1] ?? null) : null,
					'platformversion' => \is_numeric($tokens[$i+1] ?? null) ? $tokens[$i+1] : null
				];
			}),
			'ThinkPad' => new props('start', function (string $value, int $i, array $tokens) : array {
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
			}),
			'BlackBerry' => new props('start', function (string $value) : array {
				$parts = \explode('/', $value);
				return [
					'type' => 'human',
					'category' => 'mobile',
					'vendor' => 'Blackberry',
					'device' => \mb_substr($parts[0], 10) ?: null,
					'platform' => 'Blackberry OS',
					'platformversion' => $parts[1] ?? null
				];
			}),
			'CUBOT' => new props('exact', fn () : array => [
				'type' => 'human',
				'vendor' => 'Cubot'
			]),
			'TCL ' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'TCL',
				'model' => \mb_substr($value, 4)
			]),
			'deviceName/' => new props('start', fn (string $value) : array => self::getDevice(\mb_substr($value, 11))),
			'deviceModel/' => new props('start', fn (string $value) : array => [
				'model' => \mb_substr($value, 12)
			]),
			'Model/' => new props('start', fn (string $value) : array => [
				'model' => \mb_substr($value, 6)
			]),
			'Build/' => new props('any', fn (string $value) : array => self::getDevice($value)),
			'width=' => new props('start', fn (string $value) : array => [
				'width' => \intval(\mb_substr($value, 6))
			]),
			'height=' => new props('start', fn (string $value) : array => [
				'height' => \intval(\mb_substr($value, 7))
			]),
			'dpi=' => new props('start', fn (string $value) : array => [
				'dpi' => \mb_substr($value, 4)
			]),
			'NetType/' => new props('start', function (string $value) : array {
				$type = \mb_convert_case(\mb_substr($value, 8), MB_CASE_UPPER);
				return [
					'nettype' => \in_array($type, ['WF', 'WIFI'], true) ? 'WiFi' : $type
				];
			}),
			'netWorkType/' => new props('start', function (string $value) : array {
				$type = \mb_convert_case(\mb_substr($value, 12), MB_CASE_UPPER);
				return [
					'nettype' => \in_array($type, ['WF', 'WIFI'], true) ? 'WiFi' : $type
				];
			}),
			'2G' => new props('exact', ['nettype' => '2g']),
			'3G' => new props('exact', ['nettype' => '3g']),
			'4G' => new props('exact', ['nettype' => '4g']),
			'4.5G' => new props('exact', ['nettype' => '4g']),
			'4.5G+' => new props('exact', ['nettype' => '4g']),
			'5G' => new props('exact', ['nettype' => '5g']),
			'x' => new props('any', function (string $value) : ?array {
				if (\str_contains($value, '@')) {
					$dpi = \explode('@', $value);
					$value = $dpi[0];
				}
				$parts = \explode('x', $value);
				if (!isset($parts[2]) && \is_numeric($parts[0]) && \is_numeric($parts[1]) && !empty($parts[0]) && !empty($parts[1])) {
					return [
						'width' => \intval($parts[0]),
						'height' => \intval($parts[1]),
						'density' => isset($dpi[1]) ? \floatval(\rtrim($dpi[1], 'x')) : null
					];
				}
				return null;
			}),
			'MB' => new props('end', fn (string $value) : array => [
				'ram' => \intval(\mb_substr($value, 0, -2))
			])
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
			'CPH' =>'OnePlus',
			'KB' => 'OnePlus',
			'Pixel' => 'Google',
			'SM-' => 'Samsung',
			'LM-' => 'LG',
			'LG' => 'LG',
			'LG-' => 'LG',
			'RealMe' => 'RealMe',
			'RMX' => 'RealMe',
			'HTC' => 'HTC',
			'Nexus' => 'Google',
			'Redmi' => 'Redmi', // must be above 'MI '
			'MI ' => 'Xiaomi',
			'HM ' => 'Xiaomi',
			'Xiaomi' => 'Xiaomi',
			'Huawei' => 'Huawei',
			'Honor' => 'Honor',
			'Motorola' => 'Motorola',
			'moto' => 'Motorola',
			'Intel' => 'Intel',
			'SonyEricsson' => 'Sony Ericsson',
			'Tecno' => 'Tecno',
			'Vivo' => 'Vivo',
			'Oppo' => 'Oppo',
			'Asus' => 'Asus',
			'Acer' => 'Acer',
			'Alcatel' => 'Alcatel',
			'Infinix' => 'Infinix',
			'Poco' => 'Poco',
			'Cubot' => 'Cubot',
			'Kingkong' => 'Cubot',
			'Nokia' => 'Nokia',
			'WR' => 'Westinghouse',
			'HKP' => 'HKPro',
			'Roku' => 'Roku',
			'TCL' => 'TCL'
		];

		// find vendor
		$vendor = null;
		foreach ($vendors AS $key => $item) {
			if (($pos = \mb_stripos($value, $key)) !== false) {
				$vendor = self::getVendor($item);

				// remove vendor name
				if ($pos === 0 && ($key === $item || $key === 'SonyEricsson')) {
					$parts[0] = \trim(\mb_substr($parts[0], \mb_strlen($key)), ' -_/');
				}
				break;
			}
		}
		$model = \explode(' ', \str_replace('_', ' ', $parts[0]), 2);
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
			'vendor' => $vendor,
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