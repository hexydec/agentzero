<?php
declare(strict_types = 1);

final class devicesTest extends \PHPUnit\Framework\TestCase {

	public function testIphone() : void {
		$strings = [
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'Arm',
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
				'browserversion' => '16.2',
				'browserreleased' => '2022-12-13'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/243.0.495136164 Mobile/15E148 Safari/604.1' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/243.0.495136164 Mobile/15E148 Safari/604.1',
				'app' => 'Google',
				'appname' => 'GSA',
				'appversion' => '243.0.495136164',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'Arm',
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
				'browserversion' => '604.1',
				// 'browserreleased' => '2014-06-06'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/20B101 [FBAN/FBIOS;FBDV/iPhone13,4;FBMD/iPhone;FBSN/iOS;FBSV/16.1.1;FBSS/3;FBID/phone;FBLC/en_GB;FBOP/5]' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/20B101 [FBAN/FBIOS;FBDV/iPhone13,4;FBMD/iPhone;FBSN/iOS;FBSV/16.1.1;FBSS/3;FBID/phone;FBLC/en_GB;FBOP/5]',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'Arm',
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
				'appname' => 'FBIOS',
				'language' => 'en-GB',
				// 'browserreleased' => '2014-06-06'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testIpad() : void {
		$strings = [
			'Mozilla/5.0 (iPad; CPU OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/108.0.5359.112 Mobile/15E148 Safari/604.1' => [
				'string' => 'Mozilla/5.0 (iPad; CPU OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/108.0.5359.112 Mobile/15E148 Safari/604.1',
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'Arm',
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
				'browserversion' => '108.0.5359.112',
				'browserreleased' => '2023-01-10'
			],
			'Mozilla/5.0 (iPad; CPU OS 15_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.7 Mobile/15E148 DuckDuckGo/7 Safari/605.1.15' => [
				'string' => 'Mozilla/5.0 (iPad; CPU OS 15_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.7 Mobile/15E148 DuckDuckGo/7 Safari/605.1.15',
				'app' => 'DuckDuckGo',
				'appname' => 'DuckDuckGo',
				'appversion' => '7',
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'Arm',
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
				'browserversion' => '15.7',
				'browserreleased' => '2022-07-20'
			],
			'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1' => [
				'string' => 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1',
				'type' => 'human',
				'category' => 'tablet',
				'architecture' => 'Arm',
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
				'browserversion' => '10.0',
				'browserreleased' => '2017-07-19'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testIpod() : void {
		$strings = [
			'Mozilla/5.0 (iPod; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3A101a Safari/419.3' => [
				'string' => 'Mozilla/5.0 (iPod; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3A101a Safari/419.3',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'Arm',
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
				'browserversion' => '3.0',
				'language' => 'en',
				'browserreleased' => '2007-06-22'
			],
			'Mozilla/5.0 (iPod touch; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6 Mobile/15E148 Safari/604.1' => [
				'string' => 'Mozilla/5.0 (iPod touch; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6 Mobile/15E148 Safari/604.1',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'Arm',
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
				'browserversion' => '15.6',
				'browserreleased' => '2022-07-20'
			],
			'Mozilla/5.0 (iPod; U; CPU iPhone OS 4_1 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B118 Safari/6531.22.7' => [
				'string' => 'Mozilla/5.0 (iPod; U; CPU iPhone OS 4_1 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B118 Safari/6531.22.7',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'Arm',
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
				'browserversion' => '4.0.5',
				'language' => 'en-US',
				'browserreleased' => '2009-11-11'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testChromebook() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 9; Intel Braswell Chromebook Build/R103-14816.131.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Intel Braswell Chromebook; wizpig_cheets; cheets; pt_BR; 491057560)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; Intel Braswell Chromebook Build/R103-14816.131.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Intel Braswell Chromebook; wizpig_cheets; cheets; pt_BR; 491057560)',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '290.0.0.13.76',
				'vendor' => 'Intel',
				'device' => 'Braswell',
				'model' => 'Chromebook',
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
				'engineversion' => '114.0.5735.196',
				'language' => 'pt-BR',
				'width' => 1366,
				'height' => 688,
				'dpi' => 160,
				'browserreleased' => '2023-06-26'
			],
			'Mozilla/5.0 (Linux; Android 9; Samsung Chromebook 3 Build/R103-14816.131.5; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.147 Safari/537.36 Instagram 289.0.0.25.49 Android (28/9; 160dpi; 1366x688; Google/google; Samsung Chromebook 3; celes_cheets; cheets; en_US; 488780873)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; Samsung Chromebook 3 Build/R103-14816.131.5; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.147 Safari/537.36 Instagram 289.0.0.25.49 Android (28/9; 160dpi; 1366x688; Google/google; Samsung Chromebook 3; celes_cheets; cheets; en_US; 488780873)',
				'vendor' => 'Samsung',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '289.0.0.25.49',
				'device' => 'Chromebook',
				'model' => '3',
				'build' => 'R103-14816.131.5',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.147',
				'engineversion' => '114.0.5735.147',
				'language' => 'en-US',
				'width' => 1366,
				'height' => 688,
				'dpi' => 160,
				'browserreleased' => '2023-06-26'
			],
			'Mozilla/5.0 (Linux; Android 9; Acer Chromebook 11 (C740) Build/R91-13904.97.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Acer Chromebook 11 (C740); paine_cheets; cheets; es_ES; 491057560)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; Acer Chromebook 11 (C740) Build/R91-13904.97.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Acer Chromebook 11 (C740); paine_cheets; cheets; es_ES; 491057560)',
				'vendor' => 'Acer',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '290.0.0.13.76',
				'device' => 'Chromebook',
				'model' => '11',
				'build' => 'R91-13904.97.0',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.196',
				'engineversion' => '114.0.5735.196',
				'language' => 'es-ES',
				'width' => 1366,
				'height' => 688,
				'dpi' => 160,
				'browserreleased' => '2023-06-26'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testNintendo() : void {
		$strings = [
			'Opera/9.30 (Nintendo Wii; U; ; 2047-7; en)' => [
				'string' => 'Opera/9.30 (Nintendo Wii; U; ; 2047-7; en)',
				'vendor' => 'Nintendo',
				'device' => 'Wii',
				'type' => 'human',
				'category' => 'console',
				'browser' => 'Opera',
				'browserversion' => '9.30',
				'engine' => 'Presto',
				'engineversion' => '9.30',
				'language' => 'en',
				'browserreleased' => '2008-10-08'
			],
			'Mozilla/5.0 (Nintendo Wii; U; en-US) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4200.1 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Nintendo Wii; U; en-US) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4200.1 Safari/537.36',
				'vendor' => 'Nintendo',
				'device' => 'Wii',
				'type' => 'human',
				'category' => 'console',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '86.0.4200.1',
				'engineversion' => '86.0.4200.1',
				'language' => 'en-US',
				'browserreleased' => '2020-11-11'
			],
			'Mozilla/5.0 (Nintendo Wii; WOW64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Nintendo Wii; WOW64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36',
				'vendor' => 'Nintendo',
				'device' => 'Wii',
				'type' => 'human',
				'category' => 'console',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.5666.197',
				'engineversion' => '113.0.5666.197',
				'browserreleased' => '2023-05-24'
			],
			'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36',
				'vendor' => 'Nintendo',
				'device' => 'Wii U',
				'type' => 'human',
				'category' => 'console',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.5666.197',
				'engineversion' => '113.0.5666.197',
				'architecture' => 'PowerPC',
				'browserreleased' => '2023-05-24'
			],
			'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.5 NintendoBrowser/4.2.0.10990.JP' => [
				'string' => 'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.5 NintendoBrowser/4.2.0.10990.JP',
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
				'string' => 'Mozilla/5.0 (Nintendo Wii U; WOW64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36',
				'vendor' => 'Nintendo',
				'device' => 'Wii U',
				'type' => 'human',
				'category' => 'console',
				'architecture' => 'PowerPC',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.5666.197',
				'engineversion' => '113.0.5666.197',
				'browserreleased' => '2023-05-24'
			],
			'Mozilla/5.0 (Nintendo Switch; WebApplet) AppleWebKit/609.4 (KHTML, like Gecko) NF/6.0.2.21.3 NintendoBrowser/5.1.0.22474' => [
				'string' => 'Mozilla/5.0 (Nintendo Switch; WebApplet) AppleWebKit/609.4 (KHTML, like Gecko) NF/6.0.2.21.3 NintendoBrowser/5.1.0.22474',
				'app' => 'WebApplet',
				'appname' => 'WebApplet',
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
				'string' => 'Mozilla/5.0 (Nintendo Switch; WifiWebAuthApplet) AppleWebKit/609.4 (KHTML, like Gecko) NF/6.0.2.20.5 NintendoBrowser/5.1.0.22023',
				'app' => 'WifiWebAuthApplet',
				'appname' => 'WifiWebAuthApplet',
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
				'string' => 'Mozilla/5.0 (Nintendo Switch; ShareApplet) AppleWebKit/601.6 (KHTML, like Gecko) NF/4.0.0.5.9 NintendoBrowser/5.1.0.13341',
				'app' => 'ShareApplet',
				'appname' => 'ShareApplet',
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
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testXbox() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox One) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.22621' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox One) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.22621',
				'vendor' => 'Microsoft',
				'device' => 'Xbox',
				'model' => 'One',
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
				'engineversion' => '70.0.3538.102',
				'browserreleased' => '2020-05-27'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox Series X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/110.0.100.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox Series X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/110.0.100.0',
				'vendor' => 'Microsoft',
				'device' => 'Xbox',
				'model' => 'Series X',
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
				'engineversion' => '109.0.0.0',
				'browserreleased' => '2023-02-09'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox 360) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox 360) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362',
				'vendor' => 'Microsoft',
				'device' => 'Xbox',
				'model' => '360',
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
				'engineversion' => '70.0.3538.102',
				'browserreleased' => '2019-05-21'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67 smarttv' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox;) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67 smarttv',
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
				'engineversion' => '114.0.0.0',
				'browserreleased' => '2023-06-02'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testPlaystation() : void {
		$strings = [
			'Mozilla/5.0 (PlayStation 4 2.57) AppleWebKit/537.73 (KHTML, like ED32B)' => [
				'string' => 'Mozilla/5.0 (PlayStation 4 2.57) AppleWebKit/537.73 (KHTML, like ED32B)',
				'device' => 'PlayStation',
				'model' => '4',
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
				'string' => 'Mozilla/5.0 (PlayStation 5 5.71) AppleWebKit/601.2 (KHTML, like Gecko)',
				'device' => 'PlayStation',
				'model' => '5',
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
				'string' => 'Mozilla/5.0 (PlayStation; PlayStation 5/6.02) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15',
				'device' => 'PlayStation',
				'model' => '5',
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
				'browserversion' => '15.4',
				'browserreleased' => '2022-03-14'
			],
			'Mozilla/5.0 (PlayStation; PlayStation 5/2.70) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Safari/605.1.15' => [
				'string' => 'Mozilla/5.0 (PlayStation; PlayStation 5/2.70) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Safari/605.1.15',
				'device' => 'PlayStation',
				'model' => '5',
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
				'browserversion' => '13.0',
				'browserreleased' => '2020-03-24'
			],
			'Mozilla/5.0 (PlayStation Vita 3.73) AppleWebKit/537.73 (KHTML, like Gecko) Silk/3.2' => [
				'string' => 'Mozilla/5.0 (PlayStation Vita 3.73) AppleWebKit/537.73 (KHTML, like Gecko) Silk/3.2',
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Sony',
				'device' => 'PlayStation',
				'model' => 'Vita',
				'ram' => '512',
				'processor' => 'MediaTek',
				'architecture' => 'Arm',
				'bits' => 32,
				'cpu' => 'Cortex-A9 MPCore',
				'kernel' => 'Linux',
				'platform' => 'PlayStation Vita System Software',
				'platformversion' => '3.73',
				'engine' => 'WebKit',
				'engineversion' => '537.73',
				'browser' => 'Silk',
				'browserversion' => '3.2',
				'width' => 960,
				'height' => 544,
				'dpi' => 220
			],
			'Mozilla/4.0 (PSP (PlayStation Portable); 2.00)' => [
				'string' => 'Mozilla/4.0 (PSP (PlayStation Portable); 2.00)',
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Sony',
				'device' => 'PlayStation',
				'model' => 'PSP',
				'ram' => 64,
				'architecture' => 'Arm',
				'bits' => 64,
				'cpu' => 'MIPS R4000',
				'cpuclock' => '333',
				'kernel' => 'Linux',
				'platform' => 'PlayStation Portable System Software',
				'platformversion' => '2.00',
				'engine' => 'WebKit',
				'browser' => 'NetFront',
				'width' => 480,
				'height' => 272
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testConsoles() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 11; SHIELD Android TV Build/RQ1A.210105.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 11; SHIELD Android TV Build/RQ1A.210105.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Mobile Safari/537.36',
				'platform' => 'Android',
				'platformversion' => '11',
				'vendor' => 'NVIDIA',
				'device' => 'Shield',
				'model' => 'Android TV',
				'build' => 'RQ1A.210105.003',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.196',
				'engineversion' => '114.0.5735.196',
				'type' => 'human',
				'category' => 'console',
				'browserreleased' => '2023-06-26'
			],
			'Mozilla/5.0 (Linux; Android 11; SHIELD Android TV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 11; SHIELD Android TV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36',
				'platform' => 'Android',
				'platformversion' => '11',
				'vendor' => 'NVIDIA',
				'device' => 'Shield',
				'model' => 'Android TV',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '111.0.0.0',
				'engineversion' => '111.0.0.0',
				'type' => 'human',
				'category' => 'console',
				'browserreleased' => '2023-03-29'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testTvs() : void {
		$strings = [
			'Roku/DVP-12.0 (12.0.0.4186-55)' => [
				'string' => 'Roku/DVP-12.0 (12.0.0.4186-55)',
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
				'string' => 'Mozilla/5.0 (Linux; Android 7.1.2; AFTMM) AppleWebKit/537.36 (KHTML, like Gecko) Silk/112.5.1 like Chrome/112.0.5615.213 Safari/537.36',
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'Amazon',
				'device' => 'Fire TV',
				'model' => 'AFTMM',
				'platform' => 'Android',
				'platformversion' => '7.1.2',
				'kernel' => 'Linux',
				'browser' => 'Silk',
				'browserversion' => '112.5.1',
				'engine' => 'Blink',
				'engineversion' => '112.0.5615.213',
				'browserreleased' => '2023-06-12'
			],
			'Mozilla/5.0 (Linux; Android 9; AFTKA) AppleWebKit/537.36 (KHTML, like Gecko) Silk/112.5.1 like Chrome/112.0.5615.213 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; AFTKA) AppleWebKit/537.36 (KHTML, like Gecko) Silk/112.5.1 like Chrome/112.0.5615.213 Safari/537.36',
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'Amazon',
				'device' => 'Fire TV',
				'model' => 'AFTKA',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Silk',
				'browserversion' => '112.5.1',
				'engine' => 'Blink',
				'engineversion' => '112.0.5615.213',
				'browserreleased' => '2023-06-12'
			],
			'Mozilla/5.0 (X11; Linux armv7l) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.225 Safari/537.36 CrKey/1.56.500000,gzip(gfe),gzip(gfe)' => [
				'string' => 'Mozilla/5.0 (X11; Linux armv7l) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.225 Safari/537.36 CrKey/1.56.500000,gzip(gfe),gzip(gfe)',
				'type' => 'human',
				'category' => 'tv',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'Arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'browserversion' => '90.0.4430.225',
				'engine' => 'Blink',
				'engineversion' => '90.0.4430.225',
				'app' => 'Chromecast',
				'appname' => 'CrKey',
				'appversion' => '1.56.500000',
				'browserreleased' => '2021-05-10'
			],
			'Mozilla/5.0 (Linux; Android) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.109 Safari/537.36 CrKey/1.54.248666' => [
				'string' => 'Mozilla/5.0 (Linux; Android) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.109 Safari/537.36 CrKey/1.54.248666',
				'type' => 'human',
				'category' => 'tv',
				'app' => 'Chromecast',
				'appname' => 'CrKey',
				'appversion' => '1.54.248666',
				'platform' => 'Android',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '88.0.4324.109',
				'engineversion' => '88.0.4324.109',
				'browserreleased' => '2021-01-21'
			],
			'Mozilla/5.0 (Web0S; Linux/SmartTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36 DMOST/2.0.0 (; LGE; webOSTV; WEBOS6.3.2 03.34.95; W6_lm21a;)' => [
				'string' => 'Mozilla/5.0 (Web0S; Linux/SmartTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36 DMOST/2.0.0 (; LGE; webOSTV; WEBOS6.3.2 03.34.95; W6_lm21a;)',
				'type' => 'human',
				'category' => 'tv',
				'model' => 'webOSTV',
				'build' => 'W6_lm21a',
				'vendor' => 'LG',
				'kernel' => 'Linux',
				'platform' => 'WebOS',
				'platformversion' => '6.3.2',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '79.0.3945.79',
				'engineversion' => '79.0.3945.79',
				'browserreleased' => '2019-12-10'
			],
			'Mozilla/5.0 (Web0S; Linux/SmartTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.34 Safari/537.36 HbbTV/1.4.1 (+DRM; LGE; 65SM8200PLA; WEBOS4.5 05.30.10; W45_K5LP; DTV_W19P;) FVC/3.0 (LGE; WEBOS4.5 ;)' => [
				'string' => 'Mozilla/5.0 (Web0S; Linux/SmartTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.34 Safari/537.36 HbbTV/1.4.1 (+DRM; LGE; 65SM8200PLA; WEBOS4.5 05.30.10; W45_K5LP; DTV_W19P;) FVC/3.0 (LGE; WEBOS4.5 ;)',
				'type' => 'human',
				'category' => 'tv',
				'model' => '65SM8200PLA',
				'build' => 'W45_K5LP',
				'vendor' => 'LG',
				'kernel' => 'Linux',
				'platform' => 'WebOS',
				'platformversion' => '4.5',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '53.0.2785.34',
				'engineversion' => '53.0.2785.34',
				'browserreleased' => '2016-09-29'
			],
			'Mozilla/5.0 (Linux; Android 10; BRAVIA 4K VH2 Build/QTG3.200305.006.S292; wv)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10; BRAVIA 4K VH2 Build/QTG3.200305.006.S292; wv)',
				'device' => 'Bravia',
				'model' => '4K VH2',
				'build' => 'QTG3.200305.006.S292',
				'platform' => 'Android',
				'platformversion' => '10',
				'type' => 'human',
				'kernel' => 'Linux',
				'category' => 'tv',
				'vendor' => 'Sony'
			],
			'Mozilla/5.0 (Linux; Android 9; BRAVIA 4K GB ATV3 Build/PTT1.190515.001.S52; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.65 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/402.1.0.24.84;]' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; BRAVIA 4K GB ATV3 Build/PTT1.190515.001.S52; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.65 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/402.1.0.24.84;]',
				'type' => 'human',
				'category' => 'tv',
				'vendor' => 'Sony',
				'app' => 'Facebook',
				'appname' => 'FB4A',
				'appversion' => '402.1.0.24.84',
				'device' => 'Bravia',
				'model' => '4K GB ATV3',
				'build' => 'PTT1.190515.001.S52',
				'platform' => 'Android',
				'platformversion' => '9',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '110.0.5481.65',
				'engineversion' => '110.0.5481.65',
				'browserreleased' => '2023-03-01'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testOther() : void {
		$strings = [
			'Mozilla/5.0 (Fuchsia) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 CrKey/1.56.500000 Mozilla/5.0 (X11; Linux; Fuchsia; GoogleTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Large Screen Safari/537.36 GoogleTV' => [
				'string' => 'Mozilla/5.0 (Fuchsia) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 CrKey/1.56.500000 Mozilla/5.0 (X11; Linux; Fuchsia; GoogleTV) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Large Screen Safari/537.36 GoogleTV',
				'type' => 'human',
				'category' => 'tv',
				'kernel' => 'Zircon',
				'platform' => 'Fuchsia',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '116.0.0.0',
				'engineversion' => '116.0.0.0',
				'device' => 'GoogleTV',
				'app' => 'Chromecast',
				'appname' => 'CrKey',
				'appversion' => '1.56.500000',
				'browserreleased' => '2023-09-15'
			],
			'Mozilla/5.0 (Windows Phone 8.1; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; NOKIA; Lumia 635) like Gecko' => [
				'string' => 'Mozilla/5.0 (Windows Phone 8.1; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; NOKIA; Lumia 635) like Gecko',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Nokia',
				'device' => 'Lumia',
				'model' => '635',
				'platform' => 'Windows Phone',
				'platformversion' => '8.1',
				'kernel' => 'Windows NT',
				'architecture' => 'Arm',
				'bits' => 32,
				'engine' => 'Trident',
				'engineversion' => '7.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '11.0',
				'browserreleased' => '2015-11-12'
			],
			'Mozilla/5.0 (Linux; Android 11; Nokia C01 Plus Build/RP1A.201005.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36[FBAN/EMA;FBLC/en_GB;FBAV/338.0.0.10.102;]' => [
				'string' => 'Mozilla/5.0 (Linux; Android 11; Nokia C01 Plus Build/RP1A.201005.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36[FBAN/EMA;FBLC/en_GB;FBAV/338.0.0.10.102;]',
				'app' => 'Facebook',
				'appname' => 'EMA',
				'language' => 'en-GB',
				'appversion' => '338.0.0.10.102',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Nokia',
				'model' => 'C01 Plus',
				'build' => 'RP1A.201005.001',
				'platform' => 'Android',
				'platformversion' => '11',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.5359.128',
				'engineversion' => '108.0.5359.128',
				'browserreleased' => '2023-01-10'
			],
			'Nokia6280/2.0 (03.60) Profile/MIDP-2.0 Configuration/CLDC-1.1' => [
				'string' => 'Nokia6280/2.0 (03.60) Profile/MIDP-2.0 Configuration/CLDC-1.1',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Nokia',
				'model' => '6280'
			],
			'Mozilla/5.0 (Linux; Android 4.0.3; KFTT) AppleWebKit/537.36 (KHTML, like Gecko) Silk/74.3.14 like Chrome/74.0.3729.157 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 4.0.3; KFTT) AppleWebKit/537.36 (KHTML, like Gecko) Silk/74.3.14 like Chrome/74.0.3729.157 Safari/537.36',
				'type' => 'human',
				'category' => 'tablet',
				'vendor' => 'Amazon',
				'device' => 'Fire Tablet',
				'kernel' => 'Linux',
				'model' => 'KFTT',
				'platform' => 'Android',
				'platformversion' => '4.0.3',
				'engine' => 'Blink',
				'engineversion' => '74.0.3729.157',
				'browser' => 'Silk',
				'browserversion' => '74.3.14',
				'browserreleased' => '2019-05-14'
			],
			'Mozilla/5.0 (Linux; Android 10; X30 Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 Instagram 292.0.0.31.110 Android (29/10; 480dpi; 1080x2067; CUBOT; X30; X30; mt6771; en_GB; 495673913)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10; X30 Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 Instagram 292.0.0.31.110 Android (29/10; 480dpi; 1080x2067; CUBOT; X30; X30; mt6771; en_GB; 495673913)',
				'type' => 'human',
				'category' => 'mobile',
				'model' => 'X30',
				'build' => 'QP1A.190711.020',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.128',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.128',
				'language' => 'en-GB',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '292.0.0.31.110',
				'width' => 1080,
				'height' => 2067,
				'dpi' => 480,
				'browserreleased' => '2023-01-10'
			],
			'BlackBerry8320/4.2.2 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/100' => [
				'string' => 'BlackBerry8320/4.2.2 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/100',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Blackberry',
				'device' => '8320',
				'platform' => 'Blackberry OS',
				'platformversion' => '4.2.2'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}
}