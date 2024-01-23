<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class apps {

	/**
	 * Generates a configuration array for matching apps
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		$fn = [
			'appslash' => function (string $value, int $i, array $tokens, string $match) : array {
				if (\mb_stripos($value, 'AppleWebKit') !== 0 && !\str_contains($value, '://')) {
					$parts = \explode('/', $value, 4);
					$offset = isset($parts[2]) ? 1 : 0;
					$map = [
						'YaApp_iOS' => 'Yandex',
						'YaApp_Android' => 'Yandex',
						'YaSearchApp' => 'Yandex',
						'YaBrowser' => 'Yandex',
						'LinkedInApp' => 'LinkedIn',
						'[LinkedInApp]' => 'LinkedIn',
						'GoogleApp' => 'Google',
						'com.zhiliaoapp.musically' => 'TikTok',
						'com.google.android.apps.searchlite' => 'Google',
						'com.google.android.googlequicksearchbox' => 'Google',
						'com.google.photos' => 'Google Photos',
						'com.google.ios.youtube' => 'YouTube',
						'com.google.GoogleMobile' => 'Google',
						'AlohaBrowserApp' => 'Aloha',
						'OculusBrowser' => 'Oculus Browser',
						'AndroidDownloadManager' => 'Android Download Manager'
					];
					$app = $parts[0 + $offset];
					if (\mb_stripos($app, \rtrim($match, '/')) !== false) { // check the match is before the slash
						return [
							'type' => 'human',
							'app' => $map[$app] ?? $app,
							'appname' => \trim($app, '[]'),
							'appversion' => $parts[1 + $offset] ?? null
						];
					}
				}
				return [];
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
			'com.google.GoogleMobile/' => new props('start', function (string $value, int $i, array $tokens, string $match) use ($fn) : array {
				return \array_merge($fn['appslash']($value, $i, $tokens, $match), [
					'category' => 'mobile'
				]);
			}),
			'com.google.' => new props('start', $fn['appslash']),
			'OcIdWebView' => new props('exact', function (string $value) : array {
				$data = [
					'app' => 'Google App Web View',
					'appname' => $value
				];
				return $data;
			}),
			'Instagram' => new props('any', function (string $value, int $i, array $tokens) : array {
				$parts = \explode(' ', $value, 4);
				$data = [
					'type' => 'human',
					'app' => 'Instagram',
					'appname' => 'Instagram',
					'appversion' => $parts[1] ?? null,
					'platform' => empty($parts[2]) ? null : platforms::getPlatform($parts[2])
				];
				foreach (\array_slice($tokens, $i + 1) AS $key => $item) {
					$ipad = null;
					if (($ipados = \str_starts_with($item, 'iPadOS')) || \str_starts_with($item, 'iOS ')) {
						$data['kernel'] = 'Linux';
						$data['platform'] = 'iOS';
						$data['platformversion'] = \str_replace('_', '.', \mb_substr($item, $ipados ? 7 : 4));
						$data['density'] = \floatval(\mb_substr($item, 6));
					} elseif (($iphone = \str_starts_with($item, 'iPhone')) || ($ipad = \str_starts_with($item, 'iPad')) || \str_starts_with($item, 'iPod')) {
						$data['vendor'] = 'Apple';
						$data['category'] = $ipad ? 'tablet' : 'mobile';
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

							// remove duplicated name
							if ($device[1] !== null && \mb_stripos($device[1], $device[0]) === 0) {
								unset($device[0]);
							}
							$data = \array_merge($data, devices::getDevice(\implode(' ', \array_filter($device))));
							break;
						}
					}
				}
				return $data;
			}),
			'imoAndroid/' => new props('start', fn (string $value, int $i, array $tokens) : array => \array_merge(
				isset($tokens[$i + 3]) ? devices::getDevice($tokens[$i + 3]) : [],
				[
					'app' => 'imo',
					'appname' => 'imoAndroid',
					'appversion' => ($ver = \mb_strstr($value, '/')) === false ? $value : \ltrim($ver, '/'),
					'platform' => 'Android',
					'platformversion' => $tokens[$i + 1] ?? null,
					'cpu' => $tokens[$i + 11] ?? null,
					'vendor' => isset($tokens[$i + 4]) ? devices::getVendor($tokens[$i + 4]) : null
				]
			)),
			'GSA/' => new props('any', fn (string $value) : array => [
				'app' => 'Google',
				'appname' => 'GSA',
				'appversion' => \mb_substr($value, 4)
			]),
			'DuckDuckGo/' => new props('start', $fn['appslash']),
			'FlipboardProxy/' => new props('start', $fn['appslash']),
			'Emacs/' => new props('start', $fn['appslash']),
			'AndroidDownloadManager/' => new props('start', $fn['appslash']),
			'Google-Read-Aloud' => new props('exact', [
				'type' => 'human',
				'app' => 'Google-Read-Aloud',
				'appname' => 'Google-Read-Aloud'
			]),
			'Zoom ' => new props('start', fn (string $value) : array => [
				'app' => 'Zoom',
				'appname' => 'Zoom',
				'appversion' => \mb_substr($value, 5)
			]),
			'OculusBrowser/' => new props('start', $fn['appslash']),
			'YaBrowser/' => new props('start', $fn['appslash']),
			'choqok/' => new props('start', $fn['appslash']),
			'PowerShell/' => new props('start', $fn['appslash']),
			'Quora ' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Quora',
				'appname' => 'Quora',
				'appversion' => \explode(' ', $value, 3)[1]
			]),
			'AmazonKidsBrowser/' => new props('start', $fn['appslash']),
			'Teams/' => new props('start', $fn['appslash']),
			'Viber/' => new props('start', $fn['appslash']),
			'AppleExchangeWebServices/' => new props('start', $fn['appslash']),
			'MicroMessenger/' => new props('start', fn (string $value) : array => [
				'app' => 'WeChat',
				'appname' => 'MicroMessenger',
				'appversion' => \mb_substr($value, 15)
			]),
			'weibo' => new props('any', function (string $value) : array {
				$data = [
					'app' => 'Weibo',
					'appname' => 'Weibo'
				];
				$parts = \explode('_', $value);
				foreach ($parts AS $i => $item) {
					if (\mb_stripos($item, 'Weibo') !== false) {
						$data['appname'] = $item;
						$data['appversion'] = $parts[$i + (\strspn($parts[$i + 1] ?? '', '0123456789', 0, 1) === 1 ? 1 : 2)] ?? null;
						break;
					}
				}
				return $data;
			}),

			// special parser for Facebook app because it is completely different to any other
			'FBAN/' => new props('any', function (string $value) : array {
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
				return \array_merge([
					'type' => 'human',
					'app' => 'Facebook',
					'appname' => \explode('/', $value, 2)[1]
				], $map[$value] ?? []);
			}),
			'FB_IAB/' => new props('start', fn (string $value) : array => [
				'app' => 'Facebook',
				'appname' => \mb_substr($value, 7)
			]),
			'FBAV/' => new props('start', fn (string $value) : array => [
				'appversion' => \mb_substr($value, 5)
			]),
			'FBMF/' => new props('start', fn (string $value) : array => [
				'vendor' => devices::getVendor(\mb_substr($value, 5))
			]),
			'FBDV/' => new props('start', fn (string $value) : array => devices::getDevice(\mb_substr($value, 5))),
			'FBMD/' => new props('start', fn (string $value) : array => [
				'model' => \mb_substr($value, 5)
			]),
			'FBLC/' => new props('start', $fn['langslash']),
			'FBDM/' => new props('start', function (string $value) : array {
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
			}),
			'width=' => new props('start', fn (string $value) : array => [
				'width' => \intval(\mb_substr($value, 6))
			]),
			'height=' => new props('start', fn (string $value) : array => [
				'height' => \intval(\mb_substr($value, 7))
			]),
			'dpi=' => new props('start', fn (string $value) : array => [
				'dpi' => \mb_substr($value, 4)
			]),
			'FBSN/' => new props('start', fn (string $value) : array => [
				'platform' => \mb_substr($value, 5)
			]),
			'FBSV' => new props('start', fn (string $value) : array => [
				'platformversion' => \mb_substr($value, 5)
			]),
			'isDarkMode/' => new props('start', function (string $value) : array {
				$mode = \mb_substr($value, 11);
				return [
					'darkmode' => \in_array($mode, ['0', '1'], true) ? \boolval($mode) : null
				];
			}),
			'AppTheme/' => new props('start', fn (string $value) : array => [
				'darkmode' => \mb_substr($value, 9) === 'dark'
			]),
			'ByteFullLocale/' => new props('start', $fn['langslash']),
			'NetType/' => new props('start', fn (string $value) : array => [
				'nettype' => \mb_convert_case(\mb_substr($value, 8), MB_CASE_UPPER)
			]),
			'Microsoft Office' => new props('start', function (string $value, int $i, array $tokens) : array {
				$data = [
					'type' => 'human'
				];
				if (\str_contains($value, '/')) {
					foreach (\array_slice($tokens, $i + 1) AS $item) {
						if (\str_starts_with($item, 'Microsoft ')) {
							$parts = \explode(' ', $item);
							$data['app'] = $parts[0].' '.$parts[1];
							$data['appname'] = $parts[0].' '.$parts[1];
							if (isset($parts[2])) {
								$data['appversion'] = $parts[2];
							}
							break;
						}
					}
					if (!isset($data['app'])) {
						$parts = \explode('/', $value, 2);
						$data['app'] = $parts[0];
						$data['appname'] = $parts[0];
						if (!isset($data['appversion'])) {
							$data['appversion'] = $parts[1];
						}
					}
				} else {
					$parts = \explode(' ', $value);
					$data['app'] = \rtrim($parts[0].' '.($parts[1] ?? '').' '.($parts[2] ?? ''));
					$data['appname'] = $value;
					$data['appversion'] = $parts[3] ?? null;
				}
				return $data;
			}),

			// TikTok
			'AppName/' => new props('start', fn(string $value) : array => [
				'app' => $value === 'AppName/musical_ly' ? 'TikTok' : \mb_substr($value, 8),
				'appname' => \mb_substr($value, 8)
			]),
			'app_version/' => new props('start', fn(string $value) : array => [
				'appversion' => \mb_substr($value, 12)
			]),
			'AppVersion/' => new props('any', fn(string $value) : array => [
				'appversion' => \explode('/', $value, 2)[1]
			]),
			'musical_ly' => new props('start', fn(string $value) : array => [
				'app' => 'TikTok',
				'appname' => 'musical_ly',
				'appversion' => \str_replace('_', '.', \mb_substr(\explode(' ', $value, 2)[0], 11))
			]),
				
			// generic
			'App' => new props('any', $fn['appslash'])
		];
	}
}