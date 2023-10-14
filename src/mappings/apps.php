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
			'appslash' => function (string $value, int $i, array $tokens, string $match) : ?array {
				if (\mb_stripos($value, 'AppleWebKit') !== 0 && !\str_contains($value, '://')) {
					$parts = \explode('/', $value, 4);
					$offset = isset($parts[2]) ? 1 : 0;
					$map = [
						'YaApp_iOS' => 'Yandex',
						'YaApp_Android' => 'Yandex',
						'YaSearchApp' => 'Yandex',
						'LinkedInApp' => 'LinkedIn',
						'[LinkedInApp]' => 'LinkedIn',
						'GoogleApp' => 'Google',
						'com.zhiliaoapp.musically' => 'TikTok',
						'com.google.android.apps.searchlite' => 'Google (Lite)',
						'com.google.photos' => 'Google Photos',
						'com.google.ios.youtube' => 'YouTube',
						'AlohaBrowserApp' => 'Aloha'
					];
					$app = $parts[0 + $offset];
					if (\mb_stripos($app, \rtrim($match, '/')) !== false) { // check the match is before the slash
						return [
							'app' => $map[$app] ?? $app,
							'appversion' => $parts[1 + $offset] ?? null
						];
					}
				}
				return null;
			},
			'langslash' => function (string $value) : array {
				$parts = \explode('-', \str_replace('_', '-', \explode('/', $value, 2)[1]), 4);
				$suffix = $parts[2] ?? $parts[1] ?? null;
				return [
					'language' => \strtolower($parts[0]).($suffix !== null ? '-'.\strtoupper($suffix) : '')
				];
			}
		];
		return [
			'OcIdWebView' => [
				'match' => 'exact',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$data = [
						'app' => $value
					];
					if (!empty($tokens[$i+1]) && ($json = \json_decode($tokens[$i+1], true)) !== null) {
						$data['appversion'] = $json['appVersion'] ?? null;
						$data['darkmode'] = isset($json['isDarkTheme']) ? \boolval($json['isDarkTheme']) : null;
					}
					return $data;
				}
			],
			'com.google.android.apps.' => [
				'match' => 'any',
				'categories' => $fn['appslash']
			],
			'Instagram' => [
				'match' => 'any',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$parts = \explode(' ', $value, 4);
					$data = [
						'type' => 'human',
						'app' => 'Instagram',
						'appversion' => $parts[1] ?? null,
						'platform' => empty($parts[2]) ? null : platforms::getPlatform($parts[2])
					];
					foreach (\array_slice($tokens, $i + 1) AS $key => $item) {
						if (($ipados = \str_starts_with($item, 'iPadOS')) || \str_starts_with($item, 'iOS ')) {
							$data['kernel'] = 'Linux';
							$data['platform'] = 'iOS';
							$data['platformversion'] = \str_replace('_', '.', \mb_substr($item, $ipados ? 7 : 4));
							$data['density'] = \floatval(\mb_substr($item, 6));
						} elseif (($iphone = \str_starts_with($item, 'iPhone')) || ($ipad = \str_starts_with($item, 'iPad')) || \str_starts_with($item, 'iPod')) {
							$data['vendor'] = 'Apple';
							$data['category'] = empty($ipad) ? 'mobile' : 'tablet';
							$data['device'] = $iphone ? 'iPhone' : ($ipad ? 'iPad' : 'iPod');
							$data['model'] = \str_replace(',', '.', \mb_substr($item, $iphone ? 6 : 4));
							$data['architecture'] = 'arm';
							$data['bits'] = 64;
						} elseif (\str_starts_with($item, 'scale=')) {
							$data['density'] = \floatval(\mb_substr($item, 6));
						} elseif (\str_ends_with($item, 'dpi')) {
							$data['dpi'] = \intval(\mb_substr($item, 0, -3));
						} elseif (\str_contains($item, 'x') && \strspn($item, '0123456789x') === \strlen($item)) {
							list($data['width'], $data['height']) = \array_map('intval', \explode('x', $item, 2));

							// get device when the UA string starts with "Instagram"
							if ($i === 0 && !isset($data['vendor'])) {
								$device = [
									\trim(\mb_strstr($tokens[$key + 2] ?? '', '/') ?: $tokens[$key + 2] ?? '', '/ '), // sometimes the vendor name has a / with the correct name after
									$tokens[$key + 3] ?? null
								];
								$data = \array_merge($data, devices::getDevice(\implode(' ', \array_filter($device))));
								break;
							}
						}
					}
					return $data;
				}
			],
			'GSA/' => [
				'match' => 'any',
				'categories' => fn (string $value) : array => [
					'app' => 'Google',
					'appversion' => \mb_substr($value, 4)
				]
			],
			'DuckDuckGo/' => [
				'match' => 'start',
				'categories' => $fn['appslash']
			],
			'FlipboardProxy/' => [
				'match' => 'start',
				'categories' => $fn['appslash']
			],
			'AndroidDownloadManager/' => [
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
				'match' => 'any',
				'categories' => function (string $value) : array {
					$map = [
						'FBAN/MessengerLiteForiOS' => [
							'type' => 'human',
							'app' => 'Facebook Messenger',
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
							'app' => 'Facebook Messenger'
						],
						'FacebookCanvasDesktop FBAN/GamesWindowsDesktopApp' => [
							'type' => 'human',
							'platform' => 'Windows',
							'category' => 'desktop',
							'app' => 'Facebook Gamesroom'
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
					'vendor' => devices::getVendor(\mb_substr($value, 5))
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
				'categories' => $fn['langslash']
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
			'isDarkMode/' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$mode = \mb_substr($value, 11);
					return [
						'darkmode' => \in_array($mode, ['0', '1'], true) ? \boolval($mode) : null
					];
				}
			],
			'ByteFullLocale/' => [
				'match' => 'start',
				'categories' => $fn['langslash']
			],
			'NetType/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'nettype' => \mb_convert_case(\mb_substr($value, 8), MB_CASE_UPPER)
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

			// TikTok
			'AppName/' => [
				'match' => 'start',
				'categories' => fn(string $value) : array => [
					'app' => $value === 'AppName/musical_ly' ? 'TikTok' : \mb_substr($value, 8)
				]
			],
			'app_version/' => [
				'match' => 'start',
				'categories' => fn(string $value) : array => [
					'appversion' => \mb_substr($value, 12)
				]
			],
			'AppVersion/' => [
				'match' => 'any',
				'categories' => fn(string $value) : array => [
					'appversion' => \explode('/', $value, 2)[1]
				]
			],
			'musical_ly' => [
				'match' => 'start',
				'categories' => fn(string $value) : array => [
					'app' => 'TikTok',
					'appversion' => \str_replace('_', '.', \mb_substr(\explode(' ', $value, 2)[0], 11))
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