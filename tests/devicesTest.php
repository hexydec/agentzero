<?php
use hexydec\agentzero\agentzero;

final class devicesTest extends \PHPUnit\Framework\TestCase {

	// public function testDevices() {
	// 	$strings = [];
	// 	foreach ($strings AS $ua => $item) {
	// 		$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
	// 	}
	// }

	public function testIphone() {
		$strings = [
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1' => [
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.2',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '604.1'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/243.0.495136164 Mobile/15E148 Safari/604.1' => [
				'app' => 'GSA',
				'appversion' => '243.0.495136164',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '15.6',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '604.1'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/20B101 [FBAN/FBIOS;FBDV/iPhone13,4;FBMD/iPhone;FBSN/iOS;FBSV/16.1.1;FBSS/3;FBID/phone;FBLC/en_GB;FBOP/5]' => [
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.1.1',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '20B101',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'app' => 'Facebook',
				'language' => 'en-GB'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testIpad() {
		$strings = [
			'Mozilla/5.0 (iPad; CPU OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/108.0.5359.112 Mobile/15E148 Safari/604.1' => [
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '15.6',
				'vendor' => 'Apple',
				'device' => 'iPad',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.112'
			],
			'Mozilla/5.0 (iPad; CPU OS 15_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.7 Mobile/15E148 DuckDuckGo/7 Safari/605.1.15' => [
				'app' => 'DuckDuckGo',
				'appversion' => '7',
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '15.7',
				'vendor' => 'Apple',
				'device' => 'iPad',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '605.1.15'
			],
			'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1' => [
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '10.3.3',
				'vendor' => 'Apple',
				'device' => 'iPad',
				'model' => '14G60',
				'engine' => 'WebKit',
				'engineversion' => '603.3.8',
				'browser' => 'Safari',
				'browserversion' => '602.1'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testIpod() {
		$strings = [
			'Mozilla/5.0 (iPod; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3A101a Safari/419.3' => [
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '3.0',
				'vendor' => 'Apple',
				'device' => 'iPod',
				'model' => '3A101a',
				'engine' => 'WebKit',
				'engineversion' => '420.1',
				'browser' => 'Safari',
				'browserversion' => '419.3',
				'language' => 'en'
			],
			'Mozilla/5.0 (iPod touch; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6 Mobile/15E148 Safari/604.1' => [
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '15.6',
				'vendor' => 'Apple',
				'device' => 'iPod touch',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '604.1'
			],
			'Mozilla/5.0 (iPod; U; CPU iPhone OS 4_1 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B118 Safari/6531.22.7' => [
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '4.1',
				'vendor' => 'Apple',
				'device' => 'iPod',
				'model' => '8B118',
				'engine' => 'WebKit',
				'engineversion' => '532.9',
				'browser' => 'Safari',
				'browserversion' => '6531.22.7',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testChromebook() {
		$strings = [
			'Mozilla/5.0 (Linux; Android 9; Intel Braswell Chromebook Build/R103-14816.131.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Intel Braswell Chromebook; wizpig_cheets; cheets; pt_BR; 491057560)' => [
				'app' => 'Instagram',
				'appversion' => '290.0.0.13.76',
				'vendor' => 'Intel',
				'device' => 'Braswell Chromebook',
				'build' => 'R103-14816.131.0',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.196',
				'engineversion' => '114.0.5735.196'
			],
			'Mozilla/5.0 (Linux; Android 9; Samsung Chromebook 3 Build/R103-14816.131.5; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.147 Safari/537.36 Instagram 289.0.0.25.49 Android (28/9; 160dpi; 1366x688; Google/google; Samsung Chromebook 3; celes_cheets; cheets; en_US; 488780873)' => [
				'vendor' => 'Samsung',
				'app' => 'Instagram',
				'appversion' => '289.0.0.25.49',
				'device' => 'Chromebook 3',
				'build' => 'R103-14816.131.5',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.147',
				'engineversion' => '114.0.5735.147'
			],
			'Mozilla/5.0 (Linux; Android 9; Acer Chromebook 11 (C740) Build/R91-13904.97.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Acer Chromebook 11 (C740); paine_cheets; cheets; es_ES; 491057560)' => [
				'vendor' => 'Acer',
				'app' => 'Instagram',
				'appversion' => '290.0.0.13.76',
				'device' => 'Acer Chromebook 11 (C740)',
				'build' => 'R91-13904.97.0',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.196',
				'engineversion' => '114.0.5735.196'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testNintendo() {
		$strings = [
			'Opera/9.30 (Nintendo Wii; U; ; 2047-7; en)' => [
				'vendor' => 'Nintendo',
				'device' => 'Wii',
				'type' => 'human',
				'category' => 'console',
				'browser' => 'Opera',
				'browserversion' => '9.30',
				'engine' => 'Presto',
				'engineversion' => '9.30',
				'language' => 'en'
			],
			'Mozilla/5.0 (Nintendo Wii; U; en-US) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4200.1 Safari/537.36' => [
				'vendor' => 'Nintendo',
				'device' => 'Wii',
				'type' => 'human',
				'category' => 'console',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '86.0.4200.1',
				'engineversion' => '86.0.4200.1',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Nintendo Wii; WOW64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36' => [
				'vendor' => 'Nintendo',
				'device' => 'Wii',
				'type' => 'human',
				'category' => 'console',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.5666.197',
				'engineversion' => '113.0.5666.197'
			],
			'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36' => [
				'vendor' => 'Nintendo',
				'device' => 'Wii U',
				'type' => 'human',
				'category' => 'console',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.5666.197',
				'engineversion' => '113.0.5666.197',
				'architecture' => 'PowerPC'
			],
			'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.5 NintendoBrowser/4.2.0.10990.JP' => [
				'vendor' => 'Nintendo',
				'device' => 'Wii U',
				'type' => 'human',
				'category' => 'console',
				'engine' => 'WebKit',
				'engineversion' => '536.30',
				'browser' => 'NintendoBrowser',
				'browserversion' => '4.2.0.10990.JP',
				'architecture' => 'PowerPC'
			],
			'Mozilla/5.0 (Nintendo Wii U; WOW64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36' => [
				'vendor' => 'Nintendo',
				'device' => 'Wii U',
				'type' => 'human',
				'category' => 'console',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.5666.197',
				'engineversion' => '113.0.5666.197',
				'architecture' => 'PowerPC'
			],
			'Mozilla/5.0 (Nintendo Switch; WebApplet) AppleWebKit/609.4 (KHTML, like Gecko) NF/6.0.2.21.3 NintendoBrowser/5.1.0.22474' => [
				'app' => 'WebApplet',
				'vendor' => 'Nintendo',
				'device' => 'Switch',
				'type' => 'human',
				'category' => 'console',
				'engine' => 'WebKit',
				'engineversion' => '609.4',
				'browser' => 'NintendoBrowser',
				'browserversion' => '5.1.0.22474'
			],
			'Mozilla/5.0 (Nintendo Switch; WifiWebAuthApplet) AppleWebKit/609.4 (KHTML, like Gecko) NF/6.0.2.20.5 NintendoBrowser/5.1.0.22023' => [
				'app' => 'WifiWebAuthApplet',
				'vendor' => 'Nintendo',
				'device' => 'Switch',
				'type' => 'human',
				'category' => 'console',
				'engine' => 'WebKit',
				'engineversion' => '609.4',
				'browser' => 'NintendoBrowser',
				'browserversion' => '5.1.0.22023'
			],
			'Mozilla/5.0 (Nintendo Switch; ShareApplet) AppleWebKit/601.6 (KHTML, like Gecko) NF/4.0.0.5.9 NintendoBrowser/5.1.0.13341' => [
				'app' => 'ShareApplet',
				'vendor' => 'Nintendo',
				'device' => 'Switch',
				'type' => 'human',
				'category' => 'console',
				'engine' => 'WebKit',
				'engineversion' => '601.6',
				'browser' => 'NintendoBrowser',
				'browserversion' => '5.1.0.13341'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testXbox() {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox One) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.22621' => [
				'vendor' => 'Microsoft',
				'device' => 'Xbox One',
				'type' => 'human',
				'category' => 'console',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '18.22621',
				'engine' => 'Blink',
				'engineversion' => '70.0.3538.102'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox Series X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/110.0.100.0' => [
				'vendor' => 'Microsoft',
				'device' => 'Xbox Series X',
				'type' => 'human',
				'category' => 'console',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '110.0.100.0',
				'engine' => 'Blink',
				'engineversion' => '109.0.0.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox 360) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362' => [
				'vendor' => 'Microsoft',
				'device' => 'Xbox 360',
				'type' => 'human',
				'category' => 'console',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '18.18362',
				'engine' => 'Blink',
				'engineversion' => '70.0.3538.102'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67 smarttv' => [
				'device' => 'Xbox',
				'vendor' => 'Microsoft',
				'type' => 'human',
				'category' => 'console',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.67',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testPlaystation() {
		$strings = [
			'Mozilla/5.0 (PlayStation 4 2.57) AppleWebKit/537.73 (KHTML, like ED32B)' => [
				'device' => 'PlayStation 4',
				'vendor' => 'Sony',
				'kernel' => 'Linux',
				'platform' => 'Orbis OS',
				'platformversion' => '2.57',
				'type' => 'human',
				'category' => 'console',
				'processor' => 'AMD',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'WebKit',
				'engineversion' => '537.73'
			],
			'Mozilla/5.0 (PlayStation 5 5.71) AppleWebKit/601.2 (KHTML, like Gecko)' => [
				'device' => 'PlayStation 5',
				'vendor' => 'Sony',
				'kernel' => 'Linux',
				'platform' => 'FreeBSD',
				'platformversion' => '5.71',
				'type' => 'human',
				'category' => 'console',
				'processor' => 'AMD',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'WebKit',
				'engineversion' => '601.2'
			],
			'Mozilla/5.0 (PlayStation; PlayStation 5/6.02) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15' => [
				'device' => 'PlayStation 5',
				'vendor' => 'Sony',
				'kernel' => 'Linux',
				'platform' => 'FreeBSD',
				'platformversion' => '6.02',
				'type' => 'human',
				'category' => 'console',
				'processor' => 'AMD',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '605.1.15'
			],
			'Mozilla/5.0 (PlayStation; PlayStation 5/2.70) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Safari/605.1.15' => [
				'device' => 'PlayStation 5',
				'vendor' => 'Sony',
				'kernel' => 'Linux',
				'platform' => 'FreeBSD',
				'platformversion' => '2.70',
				'type' => 'human',
				'category' => 'console',
				'processor' => 'AMD',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '605.1.15'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testConsoles() {
		$strings = [
			'Mozilla/5.0 (Linux; Android 11; SHIELD Android TV Build/RQ1A.210105.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Mobile Safari/537.36' => [
				'platform' => 'Android',
				'platformversion' => '11',
				'device' => 'Shield',
				'vendor' => 'NVIDIA',
				'build' => 'RQ1A.210105.003',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.196',
				'engineversion' => '114.0.5735.196',
				'type' => 'human',
				'category' => 'console'
			],
			'Mozilla/5.0 (Linux; Android 11; SHIELD Android TV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36' => [
				'platform' => 'Android',
				'platformversion' => '11',
				'device' => 'Shield',
				'vendor' => 'NVIDIA',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '111.0.0.0',
				'engineversion' => '111.0.0.0',
				'type' => 'human',
				'category' => 'console'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testTvs() {
		$strings = [
			'Roku/DVP-12.0 (12.0.0.4186-55)' => [
				'type' => 'human',
				'category' => 'tv',
				'kernel' => 'Linux',
				'platform' => 'Roku OS',
				'platformversion' => 'DVP-12.0',
				'vendor' => 'Roku',
				'device' => 'Roku',
				'build' => '12.0.0.4186-55'
			],
			'Mozilla/5.0 (Linux; Android 7.1.2; AFTMM) AppleWebKit/537.36 (KHTML, like Gecko) Silk/112.5.1 like Chrome/112.0.5615.213 Safari/537.36' => [
				'type' => 'human',
				'category' => 'tv',
				'device' => 'Fire TV',
				'vendor' => 'Amazon',
				'platform' => 'Android',
				'platformversion' => '7.1.2',
				'kernel' => 'Linux',
				'browser' => 'Silk',
				'browserversion' => '112.5.1',
				'engine' => 'Blink',
				'engineversion' => '112.0.5615.213'
			],
			'Mozilla/5.0 (Linux; Android 9; AFTKA) AppleWebKit/537.36 (KHTML, like Gecko) Silk/112.5.1 like Chrome/112.0.5615.213 Safari/537.36' => [
				'type' => 'human',
				'category' => 'tv',
				'device' => 'Fire TV',
				'vendor' => 'Amazon',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Silk',
				'browserversion' => '112.5.1',
				'engine' => 'Blink',
				'engineversion' => '112.0.5615.213'
			],
			'Mozilla/5.0 (X11; Linux armv7l) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.225 Safari/537.36 CrKey/1.56.500000,gzip(gfe),gzip(gfe)' => [
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'Google',
				'device' => 'Chromecast',
				'model' => '1.56.500000',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '90.0.4430.225',
				'engineversion' => '90.0.4430.225'
			],
			'Mozilla/5.0 (Linux; Android) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.109 Safari/537.36 CrKey/1.54.248666' => [
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'Google',
				'device' => 'Chromecast',
				'model' => '1.54.248666',
				'platform' => 'Android',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '88.0.4324.109',
				'engineversion' => '88.0.4324.109'
			],
			'Mozilla/5.0 (Web0S; Linux/SmartTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36 DMOST/2.0.0 (; LGE; webOSTV; WEBOS6.3.2 03.34.95; W6_lm21a;)' => [
				'type' => 'human',
				'category' => 'tv',
				'device' => 'webOSTV',
				'build' => 'W6_lm21a',
				'platformversion' => 'WEBOS6.3.2 03.34.95',
				'vendor' => 'LG',
				'kernel' => 'Linux',
				'platform' => 'WebOS',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '79.0.3945.79',
				'engineversion' => '79.0.3945.79'
			],
			'Mozilla/5.0 (Web0S; Linux/SmartTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.34 Safari/537.36 HbbTV/1.4.1 (+DRM; LGE; 65SM8200PLA; WEBOS4.5 05.30.10; W45_K5LP; DTV_W19P;) FVC/3.0 (LGE; WEBOS4.5 ;)' => [
				'type' => 'human',
				'category' => 'tv',
				'device' => '65SM8200PLA',
				'build' => 'W45_K5LP',
				'platformversion' => 'WEBOS4.5 05.30.10',
				'vendor' => 'LG',
				'kernel' => 'Linux',
				'platform' => 'WebOS',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '53.0.2785.34',
				'engineversion' => '53.0.2785.34'
			],
			'Mozilla/5.0 (Linux; Android 10; BRAVIA 4K VH2 Build/QTG3.200305.006.S292; wv)' => [
				'device' => 'BRAVIA 4K VH2',
				'build' => 'QTG3.200305.006.S292',
				'platform' => 'Android',
				'platformversion' => '10',
				'type' => 'human',
				'kernel' => 'Linux'
			],
			'Mozilla/5.0 (Linux; Android 9; BRAVIA 4K GB ATV3 Build/PTT1.190515.001.S52; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.65 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/402.1.0.24.84;]' => [
				'type' => 'human',
				'category' => 'mobile',
				'app' => 'Facebook',
				'appversion' => '402.1.0.24.84',
				'device' => 'BRAVIA 4K GB ATV3',
				'build' => 'PTT1.190515.001.S52',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '110.0.5481.65',
				'engineversion' => '110.0.5481.65'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testOther() {
		$strings = [
			'Mozilla/5.0 (Fuchsia) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 CrKey/1.56.500000 Mozilla/5.0 (X11; Linux; Fuchsia; GoogleTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Large Screen Safari/537.36 GoogleTV' => [
				'type' => 'human',
				'category' => 'tv',
				'kernel' => 'Zircon',
				'platform' => 'Fuchsia',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '116.0.0.0',
				'engineversion' => '116.0.0.0',
				'vendor' => 'Google',
				'device' => 'Chromecast',
				'model' => '1.56.500000'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}
}