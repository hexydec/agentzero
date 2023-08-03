<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class apps {

	public static function get() {
		$fn = [
			'appslash' => function (string $value) : ?array {
				if (!\str_starts_with($value, 'AppleWebKit') && !\str_contains($value, '://')) {
					$parts = \explode('/', $value, 2);
					return [
						'app' => $parts[0],
						'appversion' => $parts[1] ?? null
					];
				}
				return null;
			}
		];
		return [
			'com.google.android.apps.' => [
				'match' => 'any',
				'categories' => $fn['appslash']
			],
			'Instagram' => [
				'match' => 'any',
				'categories' => fn (string $value) : array => [
					'app' => 'Instagram',
					'appversion' => \explode(' ', $value, 3)[1] ?? null
				]
			],
			'GSA/' => [
				'match' => 'any',
				'categories' => $fn['appslash']
			],
			'DuckDuckGo/' => [
				'match' => 'start',
				'categories' => $fn['appslash']
			],
			'FlipboardProxy/' => [
				'match' => 'start',
				'categories' => $fn['appslash']
			],
			'Google-Read-Aloud' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'app' => 'Google-Read-Aloud'
				]
			],

			// special parser for Facebook app because it is completely different to any other
			'FBAN/' => [
				'match' => 'start',
				'categories' => [
					'app' => 'Facebook'
				]
			],
			'FB_IAB/' => [
				'match' => 'start',
				'categories' => [
					'app' => 'Facebook'
				]
			],
			'FBAV/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'appversion' => \mb_substr($value, 5)
				]
			],
			'FBMF/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'device' => \mb_substr($value, 5)
				]
			],
			// 'FBMD/' => [
			// 	'match' => 'start',
			// 	'categories' => fn (string $value) : array => [
			// 		'model' => \mb_substr($value, 5)
			// 	]
			// ],
			'FBLC/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'language' => \str_replace('_', '-', \mb_substr($value, 5))
				]
			],
			'FBDM/' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$data = [];
					foreach (\explode(',', \trim($value, '{}')) AS $item) {
						$parts = \explode('=', $item);
						$data[$parts[0]] = $parts[1] ?? null;
					}
					return $data;
				}
			],

			// other
			'MAUI' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'app' => $value
				]
			],
			'AppName/' => [
				'match' => 'start',
				'categories' => fn(string $value) : array => [
					'app' => \mb_substr($value, 8)
				]
			],
			'app_version/' => [
				'match' => 'start',
				'categories' => fn(string $value) : array => [
					'appversion' => \mb_substr($value, 12)
				]
			],
				
			// generic
			'App' => [
				'match' => 'any',
				'categories' => $fn['appslash']
			],
		];
	}
}