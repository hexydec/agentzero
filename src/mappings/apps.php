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
				if (\mb_stripos($value, 'AppleWebKit') === false && !\str_contains($value, '://') && !\str_starts_with($value, 'appid/')) {
					$parts = \explode('/', $value, 4);
					$offset = isset($parts[2]) && !\is_numeric($parts[1]) ? 1 : 0;
					$app = \str_replace('GooglePlayStore ', '', $parts[0 + $offset]);
					if (\mb_stripos($app, \rtrim($match, '/')) !== false) { // check the match is before the slash
						return [
							'app' => self::getApp($app),
							'appname' => \trim($app, '[]'),
							'appversion' => $parts[1 + $offset] ?? null
						];
					}
				}
				return [];
			},
		];
		return [
			'com.google.' => new props('start', function (string $value) : array {
				$parts = \explode('/', $value, 3);
				return [
					'type' => 'human',
					'app' => self::getApp($parts[0]),
					'appname' => $parts[0],
					'appversion' => $parts[1] ?? null
				];
			}),
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
						$data['architecture'] = 'Arm';
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
			'GSA/' => new props('any', $fn['appslash']),
			'DuckDuckGo/' => new props('start', $fn['appslash']),
			'FlipboardProxy/' => new props('start', $fn['appslash']),
			'Emacs/' => new props('start', $fn['appslash']),
			'AndroidDownloadManager/' => new props('start', $fn['appslash']),
			'Zoom ' => new props('start', fn (string $value) : array => [
				'app' => 'Zoom',
				'appname' => 'Zoom',
				'appversion' => \mb_substr($value, 5)
			]),
			'Reddit/' => new props('start', function (string $value, int $i, array $tokens) : array {
				$os = !empty($tokens[$i+2]) ? \explode('/', $tokens[$i+2], 2) : null;
				$parts = !empty($os[1]) ? \explode(' ', $os[1], 3) : null;
				return [
					'type' => 'human',
					'app' => 'Reddit',
					'appname' => 'Reddit',
					'appversion' => $value === 'Reddit/Version' ? (\mb_strstr($tokens[$i+1], '/', true) ?: null) : \mb_substr($value, 7),
					'platform' => $parts[0] ?? null,
					'platformversion' => $tokens[$i+3] ?? null
				];
			}),
			'Pinterest for ' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Pinterest',
				'appname' => 'Pinterest',
				'appversion' => \explode('/', $value, 3)[1],
				'platform' => \mb_substr($value, 14, \mb_strpos($value, '/') - 14)
			]),
			'OculusBrowser/' => new props('start', $fn['appslash']),
			'BaiduBrowser/' => new props('start', $fn['appslash']),
			'bdhonorbrowser/' => new props('start', $fn['appslash']),
			'YaBrowser/' => new props('start', $fn['appslash']),
			'YaApp_iOS/' => new props('start', $fn['appslash']),
			'YaApp_Android/' => new props('start', $fn['appslash']),
			'choqok/' => new props('start', $fn['appslash']),
			'Quora ' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Quora',
				'appname' => 'Quora',
				'appversion' => \explode(' ', $value, 3)[1]
			]),
			'AmazonKidsBrowser/' => new props('start', $fn['appslash']),
			'whisper/' => new props('start', $fn['appslash']),
			'Teams/' => new props('start', $fn['appslash']),
			'Viber/' => new props('start', $fn['appslash']),
			'MXPlayer/' => new props('start', fn (string $value) : array => [
				'app' => 'MXPlayer',
				'appname' => 'MXPlayer',
				'appversion' => \explode('/', $value, 3)[1] ?: null
			]),
			'Todoist-Android/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'platform' => 'Android',
				'app' => 'Todoist',
				'appname' => 'Todoist-Android',
				'appversion' => \explode('/', $value, 3)[1] ?: null
			]),
			'Trello for Android/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'platform' => 'Android',
				'app' => 'Trello',
				'appname' => 'Trello for Android',
				'appversion' => \explode('/', $value, 3)[1] ?: null
			]),
			'iPad PurpleMashApp' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'platform' => 'iOS',
				'vendor' => 'Apple',
				'device' => 'iPad',
				'app' => 'Purple Mash',
				'appname' => 'PurpleMashApp'
			]),
			'Instapaper for Android ' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'platform' => 'Android',
				'app' => 'Instapaper',
				'appname' => 'Instapaper',
				'appversion' => \mb_substr($value, \mb_strrpos($value, ' ') + 1)
			]),
			'Instapaper' => new props('start', fn (string $value, int $i, array $tokens, string $match) => \array_merge([
				'type' => 'human'
			], $fn['appslash']($value, $i, $tokens, $match))),
			'Player/LG' => new props('start', function (string $value, int $i, array $tokens) : ?array {
				if (\str_starts_with($tokens[$i+1], 'Player ')) {
					$parts = \explode(' ', $tokens[$i+1]);
					$device = $i === 1 ? \explode('/', $tokens[0]) : null;
					return [
						'type' => 'human',
						'vendor' => 'LG',
						'device' => $device[0] ?? null,
						'model' => $device[1] ?? null,
						'app' => 'LG Player',
						'appname' => 'LG Player',
						'appversion' => $parts[1] ?? null,
						'platform' => $parts[3] ?? null,
						'platformversion' => $parts[4] ?? null
					];
				}
				return null;
			}),
			'RobloxApp/' => new props('any', $fn['appslash']),
			'Nexo/' => new props('start', $fn['appslash']),
			'nu.nl/' => new props('any', fn (string $value) : array => [
				'app' => 'nu.nl',
				'appname' => 'nu.nl',
				'appversion' => \mb_substr($value, 6)
			]),
			'Sanoma/app' => new props('exact', fn () : array => [
				'type' => 'human',
				'app' => 'Sanoma',
				'appname' => 'Sanoma'
			]),
			'Google Web Preview' => new props('start', $fn['appslash']),
			'MicroMessenger/' => new props('start', $fn['appslash']),
			'MicroMessenger Weixin QQ' => new props('start', fn () : array => [
				'app' => 'WeChat',
				'appname' => 'MicroMessenger'
			]),
			'weibo' => new props('any', function (string $value) : array {
				$data = [
					'type' => 'human',
					'app' => 'Weibo',
					'appname' => 'Weibo'
				];
				if (\str_contains($value, '__')) {
					$parts = \explode('__', $value);
					$data = \array_merge($data, devices::getDevice($parts[0]), [
						'appname' => $parts[1],
						'appversion' => $parts[2] ?? null,
						'platform' => isset($parts[3]) ? platforms::getPlatform($parts[3]) : null,
						'platformversion' => isset($parts[4]) ? \substr($parts[4], \strcspn($parts[4], '0123456789.')) : null
					]);
				} else {
					$parts = \explode('_', $value);
					foreach ($parts AS $i => $item) {
						if (\mb_stripos($item, 'Weibo') !== false) {
							$data['appname'] = $item;
							$data['appversion'] = $parts[$i + (\strspn($parts[$i + 1] ?? '', '0123456789', 0, 1) === 1 ? 1 : 2)] ?? null;
							break;
						}
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
						'appname' => 'MessengerLiteForiOS',
						'platform' => 'iOS'
					],
					'FBAN/FB4A' => [
						'type' => 'human',
						'app' => 'Facebook',
						'appname' => 'FB4A',
						'platform' => 'Android'
					],
					'FBAN/FBIOS' => [
						'type' => 'human',
						'app' => 'Facebook',
						'appname' => 'FBIOS',
						'platform' => 'iOS'
					],
					'FBAN/FB4FireTV' => [
						'type' => 'human',
						'category' => 'tv',
						'app' => 'Facebook',
						'appname' => 'FB4FireTV',
						'platform' => 'Android'
					],
					'FBAN/MessengerDesktop' => [
						'type' => 'human',
						'category' => 'desktop',
						'app' => 'Facebook Messenger',
						'appname' => 'MessengerDesktop'
					],
					'FacebookCanvasDesktop FBAN/GamesWindowsDesktopApp' => [
						'type' => 'human',
						'platform' => 'Windows',
						'category' => 'desktop',
						'app' => 'Facebook Gamesroom',
						'appname' => 'GamesWindowsDesktopApp'
					]
				];
				return \array_merge([
					'type' => 'human',
					'app' => 'Facebook',
					'appname' => \explode('/', $value, 2)[1]
				], $map[$value] ?? []);
			}),
			'FB_IAB/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Facebook',
				'appname' => \mb_substr($value, 7)
			]),
			'FBPN/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Facebook',
				'appname' => \mb_substr($value, 5)
			]),
			'FBAV/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Facebook',
				'appname' => 'Facebook',
				'appversion' => \mb_substr($value, 5)
			]),
			'FBMF/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Facebook',
				'appname' => 'Facebook',
				'vendor' => devices::getVendor(\mb_substr($value, 5))
			]),
			'FBDV/' => new props('start', fn (string $value) : array => \array_merge(
				devices::getDevice(\mb_substr($value, 5))),
				[
					'type' => 'human',
					'app' => 'Facebook',
					'appname' => 'Facebook'
				]
			),
			'FBMD/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Facebook',
				'appname' => 'Facebook',
				'model' => \mb_substr($value, 5)
			]),
			'FBDM/' => new props('start', function (string $value) : array {
				$data = [
					'type' => 'human',
					'app' => 'Facebook',
					'appname' => 'Facebook'
				];
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
			'FBSN/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Facebook',
				'appname' => 'Facebook',
				'platform' => \mb_substr($value, 5)
			]),
			'FBSV' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'app' => 'Facebook',
				'appname' => 'Facebook',
				'platformversion' => \mb_substr($value, 5)
			]),
			'isDarkMode/' => new props('start', function (string $value) : array {
				$mode = \mb_substr($value, 11);
				return [
					'darkmode' => \in_array($mode, ['0', '1'], true) ? \boolval($mode) : null
				];
			}),
			'dark-mode' => new props('exact', ['darkmode' => true]),
			'AppTheme/' => new props('start', fn (string $value) : array => [
				'darkmode' => \mb_substr($value, 9) === 'dark'
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
			'AppName/' => new props('start', function (string $value) : array {
				$map = [
					'AppName/musical_ly' => 'TikTok',
					'AppName/aweme' => 'Douyin'
				];
				return [
					'app' => $map[$value] ?? \mb_substr($value, 8),
					'appname' => \mb_substr($value, 8)
				];
			}),
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
			'Android App' => new props('any', [
				'type' => 'human',
				'platform' => 'Android'
			]),
				
			// generic
			'App' => new props('any', $fn['appslash'])
		];
	}

	public static function getApp(string $value) : string {
		$map = [
			'YaApp_iOS' => 'Yandex',
			'YaApp_Android' => 'Yandex',
			'YaSearchApp' => 'Yandex',
			'YaBrowser' => 'Yandex',
			'YaSearchBrowser' => 'Yandex',
			'LinkedInApp' => 'LinkedIn',
			'[LinkedInApp]' => 'LinkedIn',
			'GoogleApp' => 'Google',
			'com.zhiliaoapp.musically' => 'TikTok',
			'com.google.android.apps.searchlite' => 'Google',
			'com.google.android.googlequicksearchbox' => 'Google',
			'com.google.android.gms' => 'Google',
			'com.google.GoogleMobile' => 'Google',
			'com.google.Maps' => 'Google Maps',
			'com.google.photos' => 'Google Photos',
			'com.google.ios.youtube' => 'YouTube',
			'com.google.android.youtube' => 'YouTube',
			'AlohaBrowserApp' => 'Aloha',
			'OculusBrowser' => 'Oculus Browser',
			'AndroidDownloadManager' => 'Android Download Manager',
			'imoAndroid' => 'imo',
			'MicroMessenger' => 'WeChat',
			'GSA' => 'Google',
			'baiduboxapp' => 'Baidu',
			'lite baiduboxapp' => 'Baidu',
			'baidubrowser' => 'Baidu',
			'bdhonorbrowser' => 'Baidu',
			'RobloxApp' => 'Roblox'
		];
		if (isset($map[$value])) {
			return $map[$value];
		} elseif (($pos = \mb_strrpos($value, '.')) !== false) {
			return \mb_substr($value, $pos + 1);
		}
		return $value;
	}
}