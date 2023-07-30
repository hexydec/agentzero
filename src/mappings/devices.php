<?php
namespace hexydec\agentzero;

class devices {

	public static function get() {
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
			}
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
					'device' => 'Macintosh'
				]
			],
			'Quest' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'device' => 'Oculus '.$value,
					'type' => 'human',
					'category' => 'vr'
				]
			],
			'Nintendo Wii U' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Nintendo Wii U',
					'type' => 'human',
					'category' => 'console',
					'architecture' => 'PowerPC',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo WiiU' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Nintendo Wii U',
					'type' => 'human',
					'category' => 'console',
					'architecture' => 'PowerPC',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo Wii' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Nintendo Wii',
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo 3DS' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Nintendo 3DS',
					'type' => 'human',
					'category' => 'console',
					'vendor' => 'Nintendo'
				]
			],
			'Nintendo Switch' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Nintendo Switch',
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
					'device' => 'SHIELD'
				]
			],
			'CrKey/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'tv',
					'vendor' => 'Google',
					'device' => 'Google Chromecast',
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
					'device' => 'Google Chromecast',
					'vendor' => 'Google',
					'platformversion' => \mb_substr($value, 7)
				]
			],
			'AFT' => [
				'match' => 'start',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'device' => 'Amazon Fire TV',
					'vendor' => 'Amazon'
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
						'device' => $parts[0],
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
						'device' => $parts[0],
						'build' => $parts[1] ?? null,
						'type' => 'human',
						'category' => 'mobile',
						'vendor' => 'Sony Ericsson'
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
			'BRAVIA' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'vendor' => 'Sony'
				]
			],
			'Model/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'model' => \mb_substr($value, 6)
				]
				],
			' Build/' => [
				'match' => 'any',
				'categories' => function (string $value) : array {
					$parts = \explode(' Build/', $value, 2);
					return [
						'device' => $parts[0],
						'build' => $parts[1]
					];
				}
			],
		];
	}
}