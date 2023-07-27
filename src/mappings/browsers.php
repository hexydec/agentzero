<?php
namespace hexydec\agentzero;

class browsers {

	public static function get() {
		$fn = [
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
		return [
			'HeadlessChrome/' =>  [
				'match' => 'start',
				'suffix' => 'browserversion',
				'categories' => [
					'type' => 'robot',
					'category' => 'crawler',
					'browser' => 'Chrome'
				]
			],
			'IEMobile/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Opera/' =>  [
				'match' => 'start',
				'categories' => function (string $value) use ($fn) : array {
					$data = $fn['browserslash']($value);
					return \array_merge($data, [
						'engine' => 'Presto',
						'engineversion' => $data['browserversion']
					]);
				}
			],
			'OPR/' =>  [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'MSIE ' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'browser' => 'Internet Explorer',
					'browserversion' => \mb_substr($value, 5)
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
			'Netscape/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'WebPositive/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'K-Ninja/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'OculusBrowser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'SamsungBrowser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'NintendoBrowser/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Epiphany/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Silk/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'NetFront/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			],
			'Fennec/' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'browser' => 'Fennec',
					'engine' => 'Gecko',
					'category' => 'mobile',
					'browserversion' => \mb_substr($value, 7),
					'engineversion' => \mb_substr($value, 7)
				]
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
			'BOIE9' => [
				'match' => 'exact',
				'categories' => [
					'browser' => 'Internet Explorer',
					'browserversion' => '9'
				]
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
			'Mozilla/' => [
				'match' => 'start',
				'categories' => $fn['browserslash']
			]
		];
	}
}