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
			},
			'facebook' => function (string $value) : array {
				$data = [
					'app' => 'Facebook'
				];
				$mapping = [
					'FBAV' => 'appversion',
					'FBMF' => 'device',
					'FBMD' => 'device',
					'FBLC' => fn (string $value) : array => [
						'language' => \str_replace('_', '-', $value)
					],
					'FBCR' => 'network',
					'FBDM' => function (string $value) : array {
						$data = [];
						foreach (\explode(',', \trim($value, '{}')) AS $item) {
							$parts = \explode('=', $item);
							$data[$parts[0]] = $parts[1];
						}
						return $data;
					}
				];
				foreach (\explode(';', $value) AS $item) {
					$parts = \explode('/', $item);
					if (isset($mapping[$parts[0]])) {

						// closure
						if ($mapping[$parts[0]] instanceof \Closure) {
							$data = \array_merge($data, $mapping[$parts[0]]($parts[1]));

						// no value
						} elseif (empty($data[$mapping[$parts[0]]])) {
							$data[$mapping[$parts[0]]] = $parts[1];

						// append value
						} else {
							$data[$mapping[$parts[0]]] .= ' '.$parts[1];
						}
					}
				}
				return $data;
			}
		];
		return [
			'com.google.android.apps.' => [
				'match' => 'any',
				'categories' => $fn['appslash']
			],
			'Instagram' => [
				'match' => 'any',
				'categories' => fn (string $value, int $i, array $tokens) : array => [
					'app' => $value,
					'appversion' => $tokens[++$i] ?? null
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
			'FBAN/FB4A' => [
				'match' => 'any',
				'categories' => $fn['facebook']
			],
			'FBAN/FBIOS' => [
				'match' => 'any',
				'categories' => $fn['facebook']
			],
			'FB_IAB/FB4A' => [
				'match' => 'any',
				'categories' => $fn['facebook']
			],

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