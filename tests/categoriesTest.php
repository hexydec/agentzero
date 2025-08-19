<?php
declare(strict_types = 1);

final class categoriesTest extends \PHPUnit\Framework\TestCase {

	public function testMobile() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA308239) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.1296.98 Mobile Safari/537.3' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA308239) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.1296.98 Mobile Safari/537.3',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'HTC',
				'device' => 'One',
				'model' => 'M9',
				'build' => 'MRA308239',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '6.0',
				'engine' => 'Blink',
				'engineversion' => '52.0.1296.98',
				'browser' => 'Chrome',
				'browserversion' => '52.0.1296.98',
				'browserreleased' => '2016-08-03'
			],
			'Mozilla/5.0 (Android 13; Mobile; rv:108.0) Gecko/108.0 Firefox/108.0' => [
				'string' => 'Mozilla/5.0 (Android 13; Mobile; rv:108.0) Gecko/108.0 Firefox/108.0',
				'type' => 'human',
				'category' => 'mobile',
				'platform' => 'Android',
				'platformversion' => '13',
				'engine' => 'Gecko',
				'engineversion' => '108.0',
				'browser' => 'Firefox',
				'browserversion' => '108.0',
				'browserreleased' => '2022-12-13'
			],
			'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/107.0.5304.141 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/396.0.0.21.104;]' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/107.0.5304.141 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/396.0.0.21.104;]',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Redmi',
				'device' => 'Note',
				'model' => '4',
				'build' => 'NRD90M',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'engine' => 'Blink',
				'engineversion' => '107.0.5304.141',
				'browser' => 'Chrome',
				'browserversion' => '107.0.5304.141',
				'app' => 'Facebook',
				'appname' => 'FB4A',
				'appversion' => '396.0.0.21.104',
				'browserreleased' => '2022-11-29'
			],
			'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30' => [
				'string' => 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Xiaomi',
				'device' => 'HM',
				'model' => 'NOTE 1W',
				'build' => 'KOT49H',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '4.4.2',
				'engine' => 'WebKit',
				'engineversion' => '534.30',
				'browser' => 'UCBrowser',
				'browserversion' => '11.0.5.850',
				'language' => 'en-US',
				'browserreleased' => '2016-09-10'
			],
			'Mozilla/5.0 (Linux; Android 8.0.0; moto e5 play Build/ODPS27.91-121-2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.79 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 8.0.0; moto e5 play Build/ODPS27.91-121-2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.79 Mobile Safari/537.36',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Motorola',
				'device' => 'Moto',
				'model' => 'E5 Play',
				'build' => 'ODPS27.91-121-2',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '8.0.0',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.79',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.79',
				'browserreleased' => '2022-12-02'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testTablet() : void {
		$strings = [
			'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; Tablet PC 2.0; wbx 1.0.0; ms-office)' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; Tablet PC 2.0; wbx 1.0.0; ms-office)',
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Trident',
				'engineversion' => '7.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '7.0',
				'browserreleased' => '2006-10-18'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.1 ; en-us; ThinkPad Tablet Build/ThinkPadTablet_A310_02) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1 ; en-us; ThinkPad Tablet Build/ThinkPadTablet_A310_02) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13',
				'type' => 'human',
				'category' => 'desktop',
				'vendor' => 'Lenovo',
				'device' => 'ThinkPadTablet',
				'model' => 'A310',
				'build' => '02',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'WebKit',
				'engineversion' => '534.13',
				'browser' => 'Safari',
				'browserversion' => '4.0',
				'language' => 'en-US',
				'browserreleased' => '2009-11-11'
			],
			'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 10.0; Win64; x64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; Tablet PC 2.0; HCTE; Zoom 3.6.0; ms-office; MSOffice 16)' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 10.0; Win64; x64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; Tablet PC 2.0; HCTE; Zoom 3.6.0; ms-office; MSOffice 16)',
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Trident',
				'engineversion' => '7.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '7.0',
				'app' => 'Zoom',
				'appname' => 'Zoom',
				'appversion' => '3.6.0',
				'framework' => '.NET Common Language Runtime',
				'frameworkversion' => '3.5.30729',
				'browserreleased' => '2006-10-18'
			],
			'Mozilla/5.0 (Linux; Android 10.0; tablet Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.130 Safari/537.36 [FB_IAB/FB4A;FBAV/419.0.0.37.71;]' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10.0; tablet Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.130 Safari/537.36 [FB_IAB/FB4A;FBAV/419.0.0.37.71;]',
				'type' => 'human',
				'category' => 'tablet',
				'build' => 'O11019',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10.0',
				'engine' => 'Blink',
				'engineversion' => '114.0.5735.130',
				'browser' => 'Chrome',
				'browserversion' => '114.0.5735.130',
				'app' => 'Facebook',
				'appname' => 'FB4A',
				'appversion' => '419.0.0.37.71',
				'browserreleased' => '2023-06-26'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testVr() : void {
		$strings = [
			'Mozilla/5.0 (X11; Linux x86_64; Quest 2) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/25.3.0.4.30.438623098 SamsungBrowser/4.0 Chrome/108.0.5359.179 VR Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64; Quest 2) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/25.3.0.4.30.438623098 SamsungBrowser/4.0 Chrome/108.0.5359.179 VR Safari/537.36',
				'type' => 'human',
				'category' => 'vr',
				'vendor' => 'Oculus',
				'device' => 'Quest',
				'model' => '2',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.179',
				'browser' => 'Samsung Internet',
				'browserversion' => '4.0',
				'app' => 'Oculus Browser',
				'appname' => 'OculusBrowser',
				'appversion' => '25.3.0.4.30.438623098',
				'browserreleased' => '2023-01-10'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testLargeScreen() : void {
		$strings = [
			'Mozilla/5.0 (X11; Linux i686) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/90.0.4430.212 Large Screen Safari/534.24 GoogleTV/092754' => [
				'string' => 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/90.0.4430.212 Large Screen Safari/534.24 GoogleTV/092754',
				'type' => 'human',
				'category' => 'tv',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'WebKit',
				'engineversion' => '534.24',
				'browser' => 'Chrome',
				'browserversion' => '90.0.4430.212',
				'browserreleased' => '2021-05-10'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 OPR/89.0.4447.64 Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.127 Large Screen Safari/533.4 GoogleTV/ 162671' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 OPR/89.0.4447.64 Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.127 Large Screen Safari/533.4 GoogleTV/ 162671',
				'type' => 'human',
				'category' => 'tv',
				'device' => 'GoogleTV',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'WebKit',
				'engineversion' => '533.4',
				'browser' => 'Opera',
				'browserversion' => '89.0.4447.64',
				'language' => 'en-US',
				'browserreleased' => '2022-07-07'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.127 Large Screen Safari/533.4 GoogleTV/ 162671' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.127 Large Screen Safari/533.4 GoogleTV/ 162671',
				'type' => 'human',
				'category' => 'tv',
				'device' => 'GoogleTV',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'WebKit',
				'engineversion' => '533.4',
				'browser' => 'Chrome',
				'browserversion' => '5.0.375.127',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testTv() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 11; SMART TV Build/RP1A.200720.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.120 Safari/537.36 Instagram 288.1.0.22.66 Android (30/11; 240dpi; 1920x1080; MediaTek; SMART TV; m7332; m7332; tr_TR; 487359057)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 11; SMART TV Build/RP1A.200720.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.120 Safari/537.36 Instagram 288.1.0.22.66 Android (30/11; 240dpi; 1920x1080; MediaTek; SMART TV; m7332; m7332; tr_TR; 487359057)',
				'type' => 'human',
				'category' => 'tv',
				'device' => 'Smart TV',
				'build' => 'RP1A.200720.011',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '11',
				'engine' => 'Blink',
				'engineversion' => '83.0.4103.120',
				'browser' => 'Chrome',
				'browserversion' => '83.0.4103.120',
				'language' => 'tr-TR',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '288.1.0.22.66',
				'width' => 1920,
				'height' => 1080,
				'dpi' => 240,
				'browserreleased' => '2020-06-22'
			],
			'Mozilla/5.0 (Linux; Android 9; SMART TV Build/PPR2.180905.006.A1; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.158 Safari/537.36[FBAN/EMA;FBLC/en_US;FBAV/340.0.0.9.76;]' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; SMART TV Build/PPR2.180905.006.A1; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.158 Safari/537.36[FBAN/EMA;FBLC/en_US;FBAV/340.0.0.9.76;]',
				'type' => 'human',
				'category' => 'tv',
				'device' => 'Smart TV',
				'build' => 'PPR2.180905.006.A1',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '9',
				'engine' => 'Blink',
				'engineversion' => '66.0.3359.158',
				'browser' => 'Chrome',
				'browserversion' => '66.0.3359.158',
				'language' => 'en-US',
				'app' => 'Facebook',
				'appname' => 'EMA',
				'appversion' => '340.0.0.9.76',
				'browserreleased' => '2018-05-15'
			],
			'Mozilla/5.0 (SMART-TV; Linux; Tizen 5.5) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/3.0 Chrome/69.0.3497.106 TV Safari/537.36' => [
				'string' => 'Mozilla/5.0 (SMART-TV; Linux; Tizen 5.5) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/3.0 Chrome/69.0.3497.106 TV Safari/537.36',
				'type' => 'human',
				'category' => 'tv',
				'kernel' => 'Linux',
				'platform' => 'Tizen',
				'platformversion' => '5.5',
				'engine' => 'Blink',
				'engineversion' => '69.0.3497.106',
				'browser' => 'Samsung Internet',
				'browserversion' => '3.0',
				'browserreleased' => '2018-09-17'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	// public function testOther() : void {
	// 	$strings = [
	// 	];
	// 	foreach ($strings AS $ua => $item) {
	// 		$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
	// 	}
	// }
}