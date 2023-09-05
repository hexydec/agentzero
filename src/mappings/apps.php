<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class apps {

	/**
	 * Generates a configuration array for matching apps
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
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
				'categories' => function (string $value, int $i, array $tokens) : array {
					$data = [
						'app' => 'Instagram',
						'appversion' => \explode(' ', $value, 3)[1] ?? null
					];
					foreach (\array_slice($tokens, $i + 1) AS $item) {
						if (\str_starts_with($item, 'scale=')) {
							$data['density'] = \floatval(\mb_substr($item, 6));
						} elseif (\str_ends_with($item, 'dpi')) {
							$data['dpi'] = \intval(\mb_substr($item, 0, -3));
						} elseif (\str_contains($item, 'x') && \strspn($item, '0123456789x') === \strlen($item)) {
							list($data['width'], $data['height']) = \array_map('intval', \explode('x', $item, 2));
						}
					}
					return $data;
				}
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
			'Zoom ' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'app' => 'Zoom',
					'appversion' => \mb_substr($value, 5)
				]
			],

			// special parser for Facebook app because it is completely different to any other
			'FBAN/' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$map = [
						'FBAN/MessengerLiteForiOS' => [
							'type' => 'human',
							'app' => 'Facebook Messenger Lite',
							'platform' => 'iOS'
						],
						'FBAN/FB4A' => [
							'type' => 'human',
							'app' => 'Facebook',
							'platform' => 'Android'
						],
						'FBAN/FBIOS' => [
							'type' => 'human',
							'app' => 'Facebook',
							'platform' => 'iOS'
						],
						'FBAN/FB4FireTV' => [
							'type' => 'human',
							'category' => 'tv',
							'app' => 'Facebook',
							'platform' => 'Android'
						],
						'FBAN/MessengerDesktop' => [
							'type' => 'human',
							'category' => 'desktop',
							'app' => 'Facebook Messenger Desktop'
						]
					];
					return $map[$value] ?? [
						'app' => 'Facebook',
						'type' => 'human'
					];
				}
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
					'vendor' => \mb_substr($value, 5)
				]
			],
			'FBDV/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'device' => \mb_substr($value, 5)
				]
			],
			'FBMD/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'model' => \mb_substr($value, 5)
				]
			],
			'FBLC/' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode('-', \str_replace('_', '-', \mb_substr($value, 5)), 4);
					$suffix = $parts[2] ?? $parts[1] ?? null;
					return [
						'language' => \strtolower($parts[0]).($suffix !== null ? '-'.\strtoupper($suffix) : '')
					];
				}
			],
			'FBDM/' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$data = [];
					foreach (\explode(',', \trim(\mb_substr($value, 5), '{}')) AS $item) {
						$parts = \explode('=', $item);
						if (!empty($parts[1])) {
							if (\is_numeric($parts[1])) {
								$parts[1] = \str_contains($parts[1], '.') ? \floatval($parts[1]) : \intval($parts[1]);
							}
							$data[$parts[0]] = $parts[1];
						}
					}
					return $data;
				}
			],
			'width=' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'width' => \intval(\mb_substr($value, 6))
				]
			],
			'height=' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'height' => \intval(\mb_substr($value, 7))
				]
			],
			'dpi=' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'dpi' => \mb_substr($value, 4)
				]
			],
			'FBSN/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'platform' => \mb_substr($value, 5)
				]
			],
			'FBSV' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'platformversion' => \mb_substr($value, 5)
				]
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