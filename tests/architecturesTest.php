<?php
declare(strict_types = 1);

final class architecturesTest extends \PHPUnit\Framework\TestCase {

	public function testPPC() : void {
		$strings = [
			'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_5_8) AppleWebKit/600.8.9 (KHTML, like Gecko) Version/6.2.8 Safari/537.85.17' => [
				'string' => 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_5_8) AppleWebKit/600.8.9 (KHTML, like Gecko) Version/6.2.8 Safari/537.85.17',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'device' => 'Macintosh',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.5.8',
				'processor' => 'PowerPC',
				'architecture' => 'PowerPC',
				'engine' => 'WebKit',
				'engineversion' => '600.8.9',
				'browser' => 'Safari',
				'browserversion' => '6.2.8',
				'browserreleased' => '2012-07-25'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testX8664() : void {
		$strings = [
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.5304.87 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.5304.87 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '107.0.5304.87',
				'engineversion' => '107.0.5304.87',
				'browserreleased' => '2022-10-27'
			],
			'Mozilla/5.0 (X11; CrOS x86_64 15183.69.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; CrOS x86_64 15183.69.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '15183.69.0',
				'kernel' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'browserreleased' => '2023-01-10'
			],
			'Safari/13609.3.5.1.5 CFNetwork/902.6 Darwin/17.7.0 (x86_64)' => [
				'string' => 'Safari/13609.3.5.1.5 CFNetwork/902.6 Darwin/17.7.0 (x86_64)',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Apple Core Foundation Network',
				'appname' => 'CFNetwork',
				'appversion' => '902.6',
				'kernel' => 'Linux',
				'platform' => 'Darwin',
				'platformversion' => '17.7.0',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Safari',
				'browserversion' => '13609.3.5.1.5',
				'engine' => 'WebKit',
				'engineversion' => '13609.3.5.1.5'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testI386() : void {
		$strings = [
			'Mozilla/5.0 (X11; OpenBSD i386) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; OpenBSD i386) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'OpenBSD',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '36.0.1985.125',
				'engineversion' => '36.0.1985.125'
			],
			'Mozilla/5.0 (X11; U; OpenBSD i386; en-US; rv:1.8.1.3) Gecko/20070505 Firefox/52.0' => [
				'string' => 'Mozilla/5.0 (X11; U; OpenBSD i386; en-US; rv:1.8.1.3) Gecko/20070505 Firefox/52.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'OpenBSD',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '20070505',
				'browser' => 'Firefox',
				'browserversion' => '52.0',
				'language' => 'en-US',
				'browserreleased' => '2017-03-07'
			],
			'Mozilla/5.0 (Linux i386; X11) Gecko/20051801 Firefox/23.0' => [
				'string' => 'Mozilla/5.0 (Linux i386; X11) Gecko/20051801 Firefox/23.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '20051801',
				'browser' => 'Firefox',
				'browserversion' => '23.0',
				'browserreleased' => '2013-08-06'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testI686() : void {
		$strings = [
			'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2876.34 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2876.34 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '54.0.2876.34',
				'engineversion' => '54.0.2876.34',
				'browserreleased' => '2016-11-09'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.8) Gecko/20060911 SUSE/1.5.0.8-0.2 Firefox/52.7.3' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.8) Gecko/20060911 SUSE/1.5.0.8-0.2 Firefox/52.7.3',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'SUSE',
				'platformversion' => '1.5.0.8-0.2',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '20060911',
				'browser' => 'Firefox',
				'browserversion' => '52.7.3',
				'language' => 'en-US',
				'browserreleased' => '2017-03-07'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.10) Gecko/2009042523 Linux Mint/6 (Felicia) Firefox/52.0.1' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.10) Gecko/2009042523 Linux Mint/6 (Felicia) Firefox/52.0.1',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Mint',
				'platformversion' => '6',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '2009042523',
				'browser' => 'Firefox',
				'browserversion' => '52.0.1',
				'language' => 'en-US',
				'browserreleased' => '2017-03-07'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testIa64() : void {
		$strings = [
			'Mozilla/5.0 (compatible; MSIE 2.0; Windows NT 6.3; Win64; IA64; Trident/2.0)' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 2.0; Windows NT 6.3; Win64; IA64; Trident/2.0)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8.1',
				'processor' => 'Intel',
				'architecture' => 'Itanium',
				'bits' => 64,
				'engine' => 'Trident',
				'engineversion' => '2.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '2.0',
				'browserreleased' => '1995-11-27'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testWow64() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; BOIE9;ENUSMSNIP; rv:11.0) like Gecko' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; BOIE9;ENUSMSNIP; rv:11.0) like Gecko',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Trident',
				'engineversion' => '7.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '9.0',
				'browserreleased' => '2011-03-19'
			],
			'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8.1',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '42.0.2311.135',
				'engineversion' => '42.0.2311.135'
			],
			'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 SeaMonkey/2.35' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 SeaMonkey/2.35',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'SeaMonkey',
				'browserversion' => '2.35',
				'engine' => 'Gecko',
				'engineversion' => '38.0',
				'browserreleased' => '2015-05-12'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; MASMJS; rv:11.0) like Gecko' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; MASMJS; rv:11.0) like Gecko',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Trident',
				'engineversion' => '7.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '11.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testAmd64() : void {
		$strings = [
			'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0' => [
				'string' => 'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'OpenBSD',
				'architecture' => 'x86',
				'bits' => 64,
				'processor' => 'AMD',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '28.0',
				'engineversion' => '28.0',
				'browserreleased' => '2014-03-18'
			],
			'Mozilla/5.0 (X11; FreeBSD amd64) AppleWebKit/536.5 (KHTML like Gecko) Chrome/19.0.1084.56 Safari/536.5' => [
				'string' => 'Mozilla/5.0 (X11; FreeBSD amd64) AppleWebKit/536.5 (KHTML like Gecko) Chrome/19.0.1084.56 Safari/536.5',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'FreeBSD',
				'architecture' => 'x86',
				'bits' => 64,
				'processor' => 'AMD',
				'engine' => 'WebKit',
				'engineversion' => '536.5',
				'browser' => 'Chrome',
				'browserversion' => '19.0.1084.56'
			],
			'yacybot (/global; amd64 Windows 7 6.1; java 17.0.6; Europe/pl) http://yacy.net/bot.html' => [
				'string' => 'yacybot (/global; amd64 Windows 7 6.1; java 17.0.6; Europe/pl) http://yacy.net/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Yacy Bot',
				'appname' => 'yacybot',
				'url' => 'http://yacy.net/bot.html',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'processor' => 'AMD'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testArmv7l() : void {
		$strings = [
			'Mozilla/5.0 (X11; CrOS armv7l 12371.89.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; CrOS armv7l 12371.89.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '12371.89.0',
				'kernel' => 'Linux',
				'architecture' => 'Arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '77.0.3865.120',
				'engineversion' => '77.0.3865.120',
				'browserreleased' => '2019-10-10'
			],
			'Mozilla/5.0 (X11; U; Linux armv7l like Android; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/533.2+ Kindle/3.0+' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux armv7l like Android; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/533.2+ Kindle/3.0+',
				'type' => 'human',
				'category' => 'ebook',
				'platform' => 'Kindle',
				'platformversion' => '3.0+',
				'kernel' => 'Linux',
				'architecture' => 'Arm',
				'bits' => 32,
				'engine' => 'WebKit',
				'engineversion' => '531.2+',
				'browser' => 'Safari',
				'browserversion' => '5.0',
				'language' => 'en-US',
				'browserreleased' => '2010-07-01'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testAarch64() : void {
		$strings = [
			'Mozilla/5.0 (X11; CrOS aarch64 15183.69.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; CrOS aarch64 15183.69.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '15183.69.0',
				'kernel' => 'Linux',
				'architecture' => 'Arm',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'browserreleased' => '2023-01-10'
			],
			'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/104.0.5112.97 DuckDuckGo/5 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/104.0.5112.97 DuckDuckGo/5 Safari/537.36',
				'app' => 'DuckDuckGo',
				'appname' => 'DuckDuckGo',
				'appversion' => '5',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '4.0',
				'architecture' => 'Arm',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '104.0.5112.97',
				'engineversion' => '104.0.5112.97',
				'browserreleased' => '2022-08-22'
			],
			'Mozilla/5.0 (X11; Ubuntu; Linux aarch64; rv:109.0) Gecko/20100101 Firefox/109.0' => [
				'string' => 'Mozilla/5.0 (X11; Ubuntu; Linux aarch64; rv:109.0) Gecko/20100101 Firefox/109.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'architecture' => 'Arm',
				'bits' => 64,
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '109.0',
				'engineversion' => '109.0',
				'browserreleased' => '2023-01-17'
			],
			'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/109.0.5414.117 DuckDuckGo/5 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/109.0.5414.117 DuckDuckGo/5 Safari/537.36',
				'app' => 'DuckDuckGo',
				'appname' => 'DuckDuckGo',
				'appversion' => '5',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '4.0',
				'architecture' => 'Arm',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '109.0.5414.117',
				'engineversion' => '109.0.5414.117',
				'browserreleased' => '2023-01-24'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testIntel() : void {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.5249.119 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.5249.119 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'device' => 'Macintosh',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.15.7',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '106.0.5249.119',
				'engineversion' => '106.0.5249.119',
				'browserreleased' => '2022-10-11'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'device' => 'Macintosh',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.11',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '47.0',
				'engineversion' => '47.0',
				'browserreleased' => '2016-06-07'
			],
			'Mozilla/5.0 (Linux; Android 9; Intel Braswell Chromebook Build/R103-14816.131.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Intel Braswell Chromebook; wizpig_cheets; cheets; pt_BR; 491057560)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; Intel Braswell Chromebook Build/R103-14816.131.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Intel Braswell Chromebook; wizpig_cheets; cheets; pt_BR; 491057560)',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '290.0.0.13.76',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '9',
				'vendor' => 'Intel',
				'device' => 'Braswell',
				'model' => 'Chromebook',
				'build' => 'R103-14816.131.0',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.196',
				'engineversion' => '114.0.5735.196',
				'type' => 'human',
				'category' => 'desktop',
				'language' => 'pt-BR',
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

	public function testX64() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'browserreleased' => '2023-01-10'
			],
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:40.0) Gecko/20100101 Firefox/40.0.2 Waterfox/40.0.2' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:40.0) Gecko/20100101 Firefox/40.0.2 Waterfox/40.0.2',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Waterfox',
				'engine' => 'Gecko',
				'browserversion' => '40.0.2',
				'engineversion' => '40.0.2',
				'browserreleased' => '2015-08-11'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.1927.105 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.1927.105 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '91.0.1927.105',
				'engineversion' => '91.0.1927.105',
				'browserreleased' => '2021-07-15'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testWin64() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'browserreleased' => '2023-01-10'
			],
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '73.0.3683.75',
				'engineversion' => '73.0.3683.75',
				'browserreleased' => '2019-03-12'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '94.0.4606.81',
				'engineversion' => '94.0.4606.81',
				'browserreleased' => '2021-10-07'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testWin32() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win32; x86) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win32; x86) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '81.0.4044.129',
				'engineversion' => '81.0.4044.129',
				'browserreleased' => '2020-04-27'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win32; x32) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win32; x32) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '87.0.4280.66',
				'engineversion' => '87.0.4280.66',
				'browserreleased' => '2020-11-17'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testArm() : void {
		$strings = [
			'Mozilla/5.0 (X11; U; OpenBSD arm; en-us) AppleWebKit/531.2  (KHTML, like Gecko) Safari/531.2  Epiphany/2.30.0' => [
				'string' => 'Mozilla/5.0 (X11; U; OpenBSD arm; en-us) AppleWebKit/531.2 (KHTML, like Gecko) Safari/531.2 Epiphany/2.30.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'OpenBSD',
				'architecture' => 'Arm',
				'bits' => 32,
				'engine' => 'WebKit',
				'engineversion' => '531.2',
				'browser' => 'Epiphany',
				'browserversion' => '2.30.0',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Windows NT 10.0; ARM; 909) AppleWebKit/537.36 (KHTML like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; ARM; 909) AppleWebKit/537.36 (KHTML like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'Arm',
				'bits' => 32,
				'browser' => 'Edge',
				'browserversion' => '13.10586',
				'engine' => 'Blink',
				'engineversion' => '46.0.2486.0',
				'browserreleased' => '2015-11-05'
			],
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 YaApp_Android/23.12.1 YaSearchBrowser/23.12.1 BroPP/1.0 SA/3 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 YaApp_Android/23.12.1 YaSearchBrowser/23.12.1 BroPP/1.0 SA/3 Mobile Safari/537.36',
				'app' => 'Yandex',
				'appname' => 'YaApp_Android',
				'appversion' => '23.12.1',
				'platform' => 'Android',
				'platformversion' => '10',
				'model' => 'M2006C3MNG',
				'kernel' => 'Linux',
				'architecture' => 'Arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'type' => 'human',
				'category' => 'mobile',
				'browserreleased' => '2023-01-10'
			],
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaSearchBrowser/23.51.1 BroPP/1.0 YaSearchApp/23.51.1 webOmni SA/3 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaSearchBrowser/23.51.1 BroPP/1.0 YaSearchApp/23.51.1 webOmni SA/3 Mobile Safari/537.36',
				'app' => 'Yandex',
				'appname' => 'YaSearchApp',
				'appversion' => '23.51.1',
				'platform' => 'Android',
				'platformversion' => '10',
				'model' => 'M2006C3MNG',
				'kernel' => 'Linux',
				'architecture' => 'Arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '112.0.0.0',
				'engineversion' => '112.0.0.0',
				'type' => 'human',
				'category' => 'mobile',
				'browserreleased' => '2023-04-26'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch)' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch)',
				'type' => 'human',
				'category' => 'mobile',
				'platform' => 'Windows Phone',
				'platformversion' => '8.0',
				'kernel' => 'Windows NT',
				'bits' => 32,
				'architecture' => 'Arm',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0',
				'browserreleased' => '2012-10-26'
			],
			'Mozilla/5.0 (Windows NT 10.0; ARM; RM-1010) AppleWebKit/537.36 (KHTML like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; ARM; RM-1010) AppleWebKit/537.36 (KHTML like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'Arm',
				'bits' => 32,
				'browser' => 'Edge',
				'browserversion' => '14.14393',
				'engine' => 'Blink',
				'engineversion' => '51.0.2704.79',
				'browserreleased' => '2016-08-02'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testX86() : void {
		$strings = [
			'Mozilla/3.0 (x86 [en] Windows NT 5.1; Sun)' => [
				'string' => 'Mozilla/3.0 (x86 [en] Windows NT 5.1; Sun)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Mozilla',
				'browserversion' => '3.0',
				'language' => 'en'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testSolaris() : void {
		$strings = [
			'Mozilla/5.0 (X11; U; SunOS sun4u; pl-PL; rv:1.8.1.6) Gecko/20071217 Firefox/52.7.3' => [
				'string' => 'Mozilla/5.0 (X11; U; SunOS sun4u; pl-PL; rv:1.8.1.6) Gecko/20071217 Firefox/52.7.3',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'unix',
				'platform' => 'Solaris',
				'processor' => 'UltraSPARK',
				'architecture' => 'Spark V9',
				'bits' => 64,
				'engine' => 'Gecko',
				'engineversion' => '20071217',
				'browser' => 'Firefox',
				'browserversion' => '52.7.3',
				'language' => 'pl-PL',
				'browserreleased' => '2017-03-07'
			],
			'Mozilla/5.0 (X11; U; SunOS i86pc; en-US; rv:1.9.1.9) Gecko/20100525 Firefox/3.5.9' => [
				'string' => 'Mozilla/5.0 (X11; U; SunOS i86pc; en-US; rv:1.9.1.9) Gecko/20100525 Firefox/3.5.9',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'unix',
				'platform' => 'Solaris',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '20100525',
				'browser' => 'Firefox',
				'browserversion' => '3.5.9',
				'language' => 'en-US',
				'browserreleased' => '2009-06-30'
			],
			'Mozilla/5.0 (X11; SunOS i86pc; rv:102.0) Gecko/20100101 Thunderbird/102.6.0' => [
				'string' => 'Mozilla/5.0 (X11; SunOS i86pc; rv:102.0) Gecko/20100101 Thunderbird/102.6.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'unix',
				'platform' => 'Solaris',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Thunderbird',
				'browserversion' => '102.6.0'
			],
			'Mozilla/5.0 (X11; U; Linux sparc64; en-GB; rv:1.8.1.11) Gecko/20071217 Galeon/2.0.3 Firefox/2.0.0.11' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux sparc64; en-GB; rv:1.8.1.11) Gecko/20071217 Galeon/2.0.3 Firefox/2.0.0.11',
				'kernel' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Linux',
				'processor' => 'Fujitsu',
				'architecture' => 'Spark V9',
				'bits' => 64,
				'engine' => 'Gecko',
				'engineversion' => '20071217',
				'browser' => 'Galeon',
				'browserversion' => '2.0.3',
				'language' => 'en-GB',
				'browserreleased' => '2006-10-24'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}
}