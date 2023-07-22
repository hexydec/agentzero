<?php
namespace hexydec\agentzero;

class config {

	public static function get(array $config = []) : array {
		$fn = [
			'url' => fn (string $value) : array => [
				'url' => \ltrim($value, '+'),
				'type' => 'Crawler'
			],
			'appslash' => function (string $value) : ?array {
				if (!\str_starts_with($value, 'AppleWebKit')) {
					$parts = \explode('/', $value, 2);
					return [
						'app' => $parts[0],
						'appversion' => $parts[1] ?? null
					];
				}
				return null;
			},
			'appspace' => function (string $value) : array {
				$parts = \explode(' ', $value, 2);
				return [
					'app' => $parts[0],
					'appversion' => $parts[1] ?? null
				];
			},
			'crawlerslash' => function (string $value) : array {
				$parts = \explode('/', $value, 2);
				return [
					'app' => $parts[0],
					'appversion' => $parts[1] ?? null,
					'type' => 'Crawler'
				];
			},
			'osspace' => function (string $value) : array {
				$parts = \explode(' ', $value, 2);
				return [
					'platform' => 'Linux',
					'os' => $parts[0],
					'osversion' => $parts[1] ?? null
				];
			},
			'oslinux' => function (string $value) : array {
				$parts = \explode('/', $value, 2);
				return [
					'type' => 'Desktop',
					'platform' => 'Linux',
					'os' => $parts[0],
					'osversion' => $parts[1] ?? null
				];
			},
			'ios' => function (string $value, array $tokens) : array {
				$version = null;
				$model = null;
				foreach ($tokens AS $item) {
					if (\str_starts_with($item, 'Mobile/')) {
						$model = \mb_substr($item, 7);
					} elseif (\str_starts_with($item, 'CPU iPhone OS ')) {
						$version = \str_replace('_', '.', \mb_substr($item, 14, \mb_strpos($item, ' ', 14)));
					} elseif (\str_starts_with($item, 'CPU OS ')) {
						$version = \str_replace('_', '.', \mb_substr($item, 8, \mb_strpos($item, ' ', 8)));
					}
				}
				return [
					'type' => $value === 'iPad' ? 'Tablet' : 'Mobile',
					'architecture' => 'ARM',
					'register' => '64 Bit',
					'platform' => 'Linux',
					'os' => 'iOS',
					'osversion' => $version,
					'device' => $value,
					'model' => $model
				];
			},
			'browserslash' => function (string $value) : array {
				$parts = \explode('/', $value, 2);
				$map = [
					'OPR' => 'Opera',
					'CriOS' => 'Chrome',
					'YaBrowser' => 'Yandex',
					'Edg' => 'Edge'
				];
				return [
					'browser' => $map[$parts[0]] ?? $parts[0],
					'browserversion' => $parts[1] ?? null
				];
			},
		];
		return \array_replace_recursive([
			'ignore' => ['Mozilla/5.0', 'AppleWebKit/537.36', 'KHTML, like Gecko', 'Safari/537.36', 'compatible', 'Gecko/20100101'],
			'match' => [

				// crawler url
				'http://' => [
					'match' => 'any',
					'categories' => $fn['url']
				],
				'https://' => [
					'match' => 'any',
					'categories' => $fn['url']
				],

				// app
				'com.google.android.apps.' => [
					'match' => 'any',
					'categories' => $fn['appslash']
				],
				'Instagram' => [
					'match' => 'any',
					'categories' => $fn['appspace']
				],
				'GSA/' => [
					'match' => 'any',
					'categories' => $fn['appslash']
				],
				'DuckDuckGo/' => [
					'match' => 'start',
					'categories' => $fn['appslash']
				],
				'App' => [
					'match' => 'any',
					'categories' => $fn['appslash']
				],
				'facebookexternalhit/' => [
					'match' => 'start',
					'categories' => $fn['appslash']
				],

				// crawler
				'Yahoo! Slurp' => [
					'match' => 'exact',
					'categories' => fn (string $value) : array => [
						'app' => $value,
						'type' => 'Crawler'
					]
				],
				'Bot' => [
					'match' => 'any',
					'categories' => $fn['crawlerslash']
				],
				'bot' => [
					'match' => 'any',
					'categories' => $fn['crawlerslash']
				],
				'spider' => [
					'match' => 'any',
					'categories' => $fn['crawlerslash']
				],
				'AhrefsSiteAudit/' => [
					'match' => 'start',
					'categories' => $fn['crawlerslash']
				],

				// platforms
				'Android ' => [
					'match' => 'start',
					'categories' => $fn['osspace']
				],
				'Windows NT ' => [
					'match' => 'any',
					'categories' => function (string $value) : array {
						$mapping = [
							'5.0' => '2000',
							'5.1' => 'XP',
							'5.2' => 'XP',
							'6.0' => 'Vista',
							'6.1' => '7',
							'6.2' => '8',
							'6.3' => '8.1',
							'10.0' => '10'
						];
						$version = \mb_substr($value, 11);
						return [
							'type' => 'Desktop',
							'architecture' => 'X86',
							'platform' => 'Windows NT',
							'os' => 'Windows',
							'osversion' => $mapping[$version] ?? $version
						];
					}
				],
				'Intel Mac OS X ' => [
					'match' => 'start',
					'categories' => function (string $value) : array {
						$version = \str_replace('_', '.', \mb_substr($value, 15));
						$register = \intval(\explode('.', $version)[1]) >= 6 ? '64 bit' : null;
						return [
							'platform' => 'Linux',
							'os' => 'MacOS',
							'osversion' => $version,
							'architecture' => 'X86',
							'type' => 'Desktop',
							'register' => $register
						];
					}
				],
				'CrOS' => [
					'match' => 'start',
					'categories' => function (string $value) : array {
						$parts = \explode(' ', $value);
						$arch = [
							'x86_64' => [
								'architecture' => 'X86',
								'register' => '64 bit'
							],
							'armv7l' => [
								'architecture' => 'ARM',
								'register' => '32 bit'
							],
							'aarch64' => [
								'architecture' => 'ARM',
								'register' => '64 bit'
							],
							'arm64' => [
								'architecture' => 'ARM',
								'register' => '64 bit'
							]
						];
						return \array_merge([
							'type' => 'Desktop',
							'os' => 'Chrome OS',
							'osversion' => $parts[2] ?? null
						], $arch[$parts[1]] ?? [
							'architecture' => $parts[1]
						]);
					}
				],
				'Macintosh' => [
					'match' => 'start',
					'categories' => $fn['osspace']
				],
				'Ubuntu/' => [
					'match' => 'start',
					'categories' => $fn['oslinux']
				],
				'Mint/' => [
					'match' => 'start',
					'categories' => $fn['oslinux']
				],
				'SUSE/' => [
					'match' => 'start',
					'categories' => $fn['oslinux']
				],
				'RedHat/' => [
					'match' => 'start',
					'categories' => $fn['oslinux']
				],
				'Darwin/' => [
					'match' => 'start',
					'categories' => $fn['oslinux']
				],
				'Fedora/' => [
					'match' => 'start',
					'categories' => $fn['oslinux']
				],
				'ArchLinux' => [
					'match' => 'exact',
					'categories' => fn () : array => [
						'type' => 'Desktop',
						'platform' => 'Linux',
						'os' => 'Arch',
					]
				],
				'Arch' => [
					'match' => 'exact',
					'categories' => fn (string $value) : array => [
						'type' => 'Desktop',
						'platform' => 'Linux',
						'os' => $value,
					]
				],
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
				'Win98' => [
					'match' => 'start',
					'categories' => fn () : array => [
						'architecture' => 'X86',
						'register' => '32 bit',
						'platform' => 'Win32',
						'os' => 'Windows',
						'osversion' => '98',
						'type' => 'Desktop'
					]
				],
				'X11' => [
					'match' => 'exact',
					'categories' => fn () : array => [
						'platform' => 'Linux',
						'os' => 'X11',
						'type' => 'Desktop'
					]
				],

				// browsers
				'HeadlessChrome/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Chrome',
						'type' => 'Crawler'
					]
				],
				'Opera/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'OPR/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'MSIE ' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Internet Explorer'
					]
				],
				'CriOS/' => [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Brave/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Vivaldi/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Maxthon/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Konqueror/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'K-Meleon/' => [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'UCBrowser/' => [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Waterfox/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Waterfox',
						'engine' => 'Gecko'
					]
				],
				'PaleMoon/' => [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'PaleMoon'
					]
				],
				'SeaMonkey/' => [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'YaBrowser/' => [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'UP.Browser/' => [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Firefox/' =>  [
					'match' => 'start',
					'categories' => fn (string $value) : array => [
						'browser' => 'Firefox',
						'engine' => 'Gecko',
						'browserversion' => \mb_substr($value, 8),
						'engineversion' => \mb_substr($value, 8)
					]
				],
				'Edg/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Edge/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Safari/' =>  [
					'match' => 'start',
					'categories' => $fn['browserslash']
				],
				'Chrome/' => [
					'match' => 'start',
					'categories' => fn (string $value) : array => [
						'browser' => 'Chrome',
						'engine' => 'Blink',
						'browserversion' => \mb_substr($value, 7),
						'engineversion' => \mb_substr($value, 7)
					]
				],

				// rendering engines
				'AppleWebKit/' =>  [
					'match' => 'start',
					'categories' => fn (string $value) : array => [
						'engine' => 'WebKit',
						'engineversion' => \mb_substr($value, 12)
					]
				],
				'Gecko/' => [
					'match' => 'start',
					'categories' => fn (string $value) : array => [
						'engine' => 'Gecko',
						'engineversion' => \mb_substr($value, 6)
					]
				],

				// type
				'Mobile' => [
					'match' => 'exact',
					'categories' => [
						'type' => 'Mobile'
					]
				],
				'Android' => [
					'match' => 'any',
					'categories' => [
						'type' => 'Tablet'
					]
				],

				// architecture
				'X86_64' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'X86',
						'register' => '64 Bit'
					]
				],
				'x64' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'X86',
						'register' => '64 Bit'
					]
				],
				'Win64' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'X86',
						'register' => '64 Bit'
					]
				],
				'Win32' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'X86',
						'register' => '32 Bit'
					]
				],
				'X86' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'X86',
						'register' => '32 Bit'
					]
				],
				'i686' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'X86',
						'register' => '64 Bit'
					]
				],
				'i386' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'X86',
						'register' => '32 Bit'
					]
				],
				'arm64' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'ARM',
						'register' => '64 Bit'
					]
				],
				'arm' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'ARM',
						'register' => '32 Bit'
					]
				],

				// device
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

				// special parser for Facebook app because it is completely different to any other
				'FBAN/FB4A' => [
					'match' => 'any',
					'categories' => function (string $value) : array {
						$data = [
							'app' => 'Facebook'
						];
						$mapping = [
							'FBAV' => 'appversion',
							'FBMF' => 'device',
							'FBDV' => 'device',
							'FBCR' => 'network',
							'FBDM' => function (string $value, \stdClass $categories) : array {
								$data = [];
								foreach (explode(',', \trim($value, '{}')) AS $item) {
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
				]
			]
		], $config);
	}
}