<?php
namespace hexydec\agentzero;

class config {

	public static function get(array $config = []) : array {
		return \array_replace_recursive([
			'ignore' => ['Mozilla/5.0', 'AppleWebKit/537.36', 'KHTML, like Gecko', 'Safari/537.36', 'compatible', 'Gecko/20100101'],
			'match' => [

				// type
				'http://' => [
					'match' => 'any',
					'categories' => [
						'url' => true,
						'type' => 'Crawler'
					]
				],
				'https://' => [
					'match' => 'any',
					'categories' => [
						'url' => true,
						'type' => 'Crawler'
					]
				],

				// app
				'com.google.android.apps.' => [
					'match' => 'any',
					'delimit' => '/',
					'suffix' => 'appversion',
					'categories' => [
						'app' => true
					]
				],
				'Instagram' => [
					'match' => 'any',
					'delimit' => ' ',
					'suffix' => 'appversion',
					'categories' => [
						'app' => true
					]
				],
				'GSA/' => [
					'match' => 'any',
					'delimit' => '/',
					'suffix' => 'appversion',
					'categories' => [
						'app' => true
					]
				],
				'DuckDuckGo/' => [
					'match' => 'start',
					'suffix' => 'appversion',
					'categories' => [
						'app' => 'DuckDuckGo'
					]
				],
				'Yahoo! Slurp' => [
					'match' => 'exact',
					'categories' => [
						'app' => 'Yahoo! Slurp'
					]
				],
				'facebookexternalhit/' => [
					'match' => 'start',
					'suffix' => 'appversion',
					'categories' => [
						'app' => 'facebookexternalhit'
					]
				],
				'App' => [
					'match' => 'any',
					'ignore' => 'AppleWebKit',
					'delimit' => '/',
					'suffix' => 'appversion',
					'categories' => [
						'app' => true
					]
				],
				'Bot' => [
					'match' => 'any',
					'delimit' => '/',
					'suffix' => 'appversion',
					'categories' => [
						'app' => true,
						'type' => 'Crawler'
					]
				],
				'bot' => [
					'match' => 'any',
					'delimit' => '/',
					'suffix' => 'appversion',
					'categories' => [
						'app' => true,
						'type' => 'Crawler'
					]
				],
				'spider' => [
					'match' => 'any',
					'delimit' => '/',
					'suffix' => 'appversion',
					'categories' => [
						'app' => true,
						'type' => 'Crawler'
					]
				],
				'AhrefsSiteAudit/' => [
					'match' => 'start',
					'suffix' => 'appversion',
					'categories' => [
						'app' => 'AhrefsSiteAudit',
						'type' => 'Crawler'
					]
				],

				// platforms
				'Android ' => [
					'match' => 'start',
					'delimit' => ' ',
					'suffix' => 'plaformversion',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'Android'
					],
					'parser' => function (string $value, \stdClass $categories) : void {

					}
				],
				'Windows NT ' => [
					'match' => 'any',
					'parser' => function (string $value, \stdClass $categories) : void {
						$categories->platform = 'Windows NT';
						$categories->os = 'Windows';
						$categories->type = 'Desktop';
						$categories->architecture = 'x86';
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
						$categories->osversion = $mapping[$version] ?? $version;
					},
					'categories' => [
						'platform' => 'Windows NT',
						'os' => 'Windows',
						'type' => 'Desktop',
						'architecture' => 'x86'
					]
				],
				'Intel Mac OS X ' => [
					'match' => 'start',
					'delimit' => ' ',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'MacOS',
						'type' => 'Desktop',
						'register' => function (string $value) : ?string {
							$next = false;
							foreach (\explode(' ', \str_replace('_', ' ', $value)) AS $item) {
								if ($item === '10') {
									$next = true;
								} elseif ($next) {
									return \intval($item) >= 6 ? '64 bit' : null;
								}
							}
							return null;
						}
					]
				],
				'Macintosh' => [
					'match' => 'start',
					'delimit' => ' ',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'MacOS',
						'type' => 'Desktop'
					]
				],
				'Ubuntu/' => [
					'match' => 'start',
					'delimit' => '/',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'Ubuntu',
						'type' => 'Desktop'
					]
				],
				'Mint/' => [
					'match' => 'start',
					'delimit' => '/',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'Mint',
						'type' => 'Desktop'
					]
				],
				'SUSE/' => [
					'match' => 'start',
					'delimit' => '/',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'SUSE',
						'type' => 'Desktop'
					]
				],
				'RedHat/' => [
					'match' => 'start',
					'delimit' => '/',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'Red Hat',
						'type' => 'Desktop'
					]
				],
				'Darwin/' => [
					'match' => 'start',
					'delimit' => '/',
					'suffix' => 'plaformversion',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'Darwin',
						'type' => 'Desktop'
					]
				],
				'CPU iPhone OS ' => [
					'match' => 'start',
					'delimit' => '/',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'iOS',
						'device' => 'iPhone',
						'type' => 'Mobile',
						'architecture' => 'ARM',
						'register' => '64 Bit'
					]
				],
				'CPU OS ' => [
					'match' => 'start',
					'suffix' => 'plaformversion',
					'suffixend' => ' ',
					'categories' => [
						'platform' => 'Linux',
						'os' => 'iOS',
						'type' => 'Tablet',
						'device' => 'iPad',
						'register' => '64 Bit'
					]
				],
				'Win98' => [
					'match' => 'start',
					'categories' => [
						'platform' => 'Win32',
						'os' => 'Windows',
						'osversion' => '98',
						'type' => 'Desktop'
					]
				],
				'X11' => [
					'match' => 'start',
					'categories' => [
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
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Opera'
					]
				],
				'OPR/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Opera'
					]
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
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Chrome'
					]
				],
				'Brave/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Brave'
					]
				],
				'Vivaldi/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Vivaldi'
					]
				],
				'Maxthon/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Maxthon'
					]
				],
				'Konqueror/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Konqueror'
					]
				],
				'K-Meleon/' => [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'K-Meleon'
					]
				],
				'UCBrowser/' => [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'UCBrowser'
					]
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
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'SeaMonkey'
					]
				],
				'YaBrowser/' => [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Yandex Browser'
					]
				],
				'UP.Browser/' => [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'UP.Browser'
					]
				],
				'Firefox/' =>  [
					'match' => 'start',
					'suffix' => ['browserversion', 'engineversion'],
					'categories' => [
						'browser' => 'Firefox',
						'engine' => 'Gecko'
					]
				],
				'Edg/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Edge'
					]
				],
				'Edge/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Edge'
					]
				],
				'Safari/' =>  [
					'match' => 'start',
					'suffix' => 'browserversion',
					'categories' => [
						'browser' => 'Safari'
					]
				],
				'Chrome/' => [
					'match' => 'start',
					'suffix' => ['browserversion', 'engineversion'],
					'categories' => [
						'browser' => 'Chrome',
						'engine' => 'Blink'
					]
				],

				// rendering engines
				'AppleWebKit/' =>  [
					'match' => 'start',
					'suffix' => 'engineversion',
					'categories' => [
						'engine' => 'WebKit'
					]
				],
				'Gecko/' =>  [
					'match' => 'start',
					'suffix' => 'engineversion',
					'categories' => [
						'engine' => 'Gecko'
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
				'x86_64' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'x86',
						'register' => '64 Bit'
					]
				],
				'x64' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'x86',
						'register' => '64 Bit'
					]
				],
				'Win64' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'x86',
						'register' => '64 Bit'
					]
				],
				'Win32' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'x86',
						'register' => '32 Bit'
					]
				],
				'x86' => [
					'match' => 'exact',
					'categories' => [
						'architecture' => 'x86',
						'register' => '32 Bit'
					]
				],
				'i686' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'x86',
						'register' => '64 Bit'
					]
				],
				'i386' => [
					'match' => 'any',
					'categories' => [
						'architecture' => 'x86',
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
					'parser' => function (string $value, \stdClass $categories) : void {
						$parts = \explode(' Build/', $value, 2);
						$categories->device = $parts[0];
						$categories->build = $parts[1];
					}
				],

				// special parser for Facebook app because it is completely different to any other
				'FBAN/FB4A' => [
					'match' => 'any',
					'parser' => function (string $value, \stdClass $categories) : void {
						$categories->app = 'Facebook';
						$mapping = [
							'FBAV' => 'appversion',
							'FBMF' => 'device',
							'FBDV' => 'device',
							'FBCR' => 'network',
							'FBDM' => function (string $value, \stdClass $categories) : void {
								foreach (explode(',', \trim($value, '{}')) AS $item) {
									$parts = \explode('=', $item);
									$categories->{$parts[0]} = $parts[1];
								}
							}
						];
						foreach (\explode(';', $value) AS $item) {
							$parts = \explode('/', $item);
							if (isset($mapping[$parts[0]])) {

								// closure
								if ($mapping[$parts[0]] instanceof \Closure) {
									$mapping[$parts[0]]($parts[1], $categories);

								// no value
								} elseif (empty($categories->{$mapping[$parts[0]]})) {
									$categories->{$mapping[$parts[0]]} = $parts[1];

								// append value
								} else {
									$categories->{$mapping[$parts[0]]} .= ' '.$parts[1];
								}
							}
						}
					}
				]
			]
		], $config);
	}
}