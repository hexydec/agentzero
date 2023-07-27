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
			'console' => fn (string $value) : array => [
				'device' => $value,
				'type' => 'human',
				'category' => 'console'
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
			'Quest 2' => [
				'match' => 'exact',
				'categories' => [
					'device' => 'Oculus Quest 2',
					'type' => 'human',
					'category' => 'desktop'
				]
			],
			'Nintendo Wii U' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'Nintendo WiiU' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'Nintendo Wii' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'Xbox Series X' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'Xbox One' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'Xbox 360' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'Xbox' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'Playstation 4' => [
				'match' => 'start',
				'categories' => $fn['playstation']
			],
			'Playstation 5' => [
				'match' => 'start',
				'categories' => $fn['playstation']
			],
			'Nintendo Switch' => [
				'match' => 'exact',
				'categories' => $fn['console']
			],
			'CrKey/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'tv',
					'device' => 'Google Chromecast',
					'model' => \mb_substr($value, 6)
				]
			],
			'ChromeBook' => [
				'match' => 'any',
				'categories' => [
					'type' => 'human',
					'category' => 'desktop'
				]
			]
		];
	}
}