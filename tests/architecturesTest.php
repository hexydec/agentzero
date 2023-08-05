<?php
use hexydec\agentzero\agentzero;

final class architectureTest extends \PHPUnit\Framework\TestCase {

	public function testPPC() {
		$strings = [
			'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_5_8) AppleWebKit/600.8.9 (KHTML, like Gecko) Version/6.2.8 Safari/537.85.17' => [
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
				'browserversion' => '537.85.17'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testX8664() {
		$strings = [
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.5304.87 Safari/537.36' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '107.0.5304.87',
				'engineversion' => '107.0.5304.87'
			],
			'Mozilla/5.0 (X11; CrOS x86_64 15183.69.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
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
				'engineversion' => '108.0.0.0'
			],
			'Safari/13609.3.5.1.5 CFNetwork/902.6 Darwin/17.7.0 (x86_64)' => [
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'CFNetwork',
				'appversion' => '902.6',
				'kernel' => 'Linux',
				'platform' => 'Darwin',
				'platformversion' => '17.7.0',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Safari',
				'browserversion' => '13609.3.5.1.5'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testI386() {
		$strings = [
			'Mozilla/5.0 (X11; OpenBSD i386) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36' => [
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
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Linux i386; X11) Gecko/20051801 Firefox/23.0' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '20051801',
				'browser' => 'Firefox',
				'browserversion' => '23.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testI686() {
		$strings = [
			'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2876.34 Safari/537.36' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '54.0.2876.34',
				'engineversion' => '54.0.2876.34'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.8) Gecko/20060911 SUSE/1.5.0.8-0.2 Firefox/52.7.3' => [
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
				'language' => 'en-US'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.10) Gecko/2009042523 Linux Mint/6 (Felicia) Firefox/52.0.1' => [
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
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testIa64() {
		$strings = [
			'Mozilla/5.0 (compatible; MSIE 2.0; Windows NT 6.3; Win64; IA64; Trident/2.0)' => [
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
				'browserversion' => '2.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testWow64() {
		$strings = [
			'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; BOIE9;ENUSMSNIP; rv:11.0) like Gecko' => [
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
				'browserversion' => '11.0'
			],
			'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36' => [
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
				'engineversion' => '38.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; MASMJS; rv:11.0) like Gecko' => [
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
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testAmd64() {
		$strings = [
			'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0' => [
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
				'engineversion' => '28.0'
			],
			'Mozilla/5.0 (X11; FreeBSD amd64) AppleWebKit/536.5 (KHTML like Gecko) Chrome/19.0.1084.56 Safari/536.5' => [
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
				'type' => 'robot',
				'category' => 'search',
				'app' => 'yacybot',
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
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testArmv7l() {
		$strings = [
			'Mozilla/5.0 (X11; CrOS armv7l 12371.89.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36' => [
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '12371.89.0',
				'kernel' => 'Linux',
				'architecture' => 'arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '77.0.3865.120',
				'engineversion' => '77.0.3865.120'
			],
			'Mozilla/5.0 (X11; U; Linux armv7l like Android; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/533.2+ Kindle/3.0+' => [
				'type' => 'human',
				'category' => 'ebook',
				'platform' => 'Kindle',
				'platformversion' => '3.0+',
				'kernel' => 'Linux',
				'architecture' => 'arm',
				'bits' => 32,
				'engine' => 'WebKit',
				'engineversion' => '531.2+',
				'browser' => 'Safari',
				'browserversion' => '533.2+',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testAarch64() {
		$strings = [
			'Mozilla/5.0 (X11; CrOS aarch64 15183.69.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '15183.69.0',
				'kernel' => 'Linux',
				'architecture' => 'arm',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/104.0.5112.97 DuckDuckGo/5 Safari/537.36' => [
				'app' => 'DuckDuckGo',
				'appversion' => '5',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '4.0',
				'architecture' => 'arm',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '104.0.5112.97',
				'engineversion' => '104.0.5112.97'
			],
			'Mozilla/5.0 (X11; Ubuntu; Linux aarch64; rv:109.0) Gecko/20100101 Firefox/109.0' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'architecture' => 'arm',
				'bits' => 64,
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '109.0',
				'engineversion' => '109.0'
			],
			'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/109.0.5414.117 DuckDuckGo/5 Safari/537.36' => [
				'app' => 'DuckDuckGo',
				'appversion' => '5',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '4.0',
				'architecture' => 'arm',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '109.0.5414.117',
				'engineversion' => '109.0.5414.117'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testIntel() {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.5249.119 Safari/537.36' => [
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
				'engineversion' => '106.0.5249.119'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0' => [
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
				'engineversion' => '47.0'
			],
			'Mozilla/5.0 (Linux; Android 9; Intel Braswell Chromebook Build/R103-14816.131.0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Safari/537.36 Instagram 290.0.0.13.76 Android (28/9; 160dpi; 1366x688; Google/google; Intel Braswell Chromebook; wizpig_cheets; cheets; pt_BR; 491057560)' => [
				'app' => 'Instagram',
				'appversion' => '290.0.0.13.76',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '9',
				'vendor' => 'Intel',
				'device' => 'Braswell Chromebook',
				'build' => 'R103-14816.131.0',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.5735.196',
				'engineversion' => '114.0.5735.196',
				'type' => 'human',
				'category' => 'desktop',
				'language' => 'pt-BR'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testX64() {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
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
				'engineversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:40.0) Gecko/20100101 Firefox/40.0.2 Waterfox/40.0.2' => [
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
				'engineversion' => '40.0.2'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.1927.105 Safari/537.36' => [
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
				'engineversion' => '91.0.1927.105'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testWin64() {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
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
				'engineversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36' => [
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
				'engineversion' => '73.0.3683.75'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36' => [
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
				'engineversion' => '94.0.4606.81'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testWin32() {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win32; x86) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36' => [
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
				'engineversion' => '81.0.4044.129'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win32; x32) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36' => [
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
				'engineversion' => '87.0.4280.66'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testArm() {
		$strings = [
			'Mozilla/5.0 (X11; U; OpenBSD arm; en-us) AppleWebKit/531.2  (KHTML, like Gecko) Safari/531.2  Epiphany/2.30.0' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'OpenBSD',
				'architecture' => 'arm',
				'bits' => 32,
				'engine' => 'WebKit',
				'engineversion' => '531.2',
				'browser' => 'Epiphany',
				'browserversion' => '2.30.0',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Windows NT 10.0; ARM; 909) AppleWebKit/537.36 (KHTML like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'arm',
				'bits' => 32,
				'browser' => 'Edge',
				'browserversion' => '13.10586',
				'engine' => 'Blink',
				'engineversion' => '46.0.2486.0'
			],
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 YaApp_Android/23.12.1 YaSearchBrowser/23.12.1 BroPP/1.0 SA/3 Mobile Safari/537.36' => [
				'app' => 'YaApp_Android',
				'appversion' => '23.12.1',
				'platform' => 'Android',
				'platformversion' => '10',
				'device' => 'M2006C3MNG',
				'kernel' => 'Linux',
				'architecture' => 'arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'type' => 'human',
				'category' => 'mobile'
			],
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaSearchBrowser/23.51.1 BroPP/1.0 YaSearchApp/23.51.1 webOmni SA/3 Mobile Safari/537.36' => [
				'app' => 'YaSearchApp',
				'appversion' => '23.51.1',
				'platform' => 'Android',
				'platformversion' => '10',
				'device' => 'M2006C3MNG',
				'kernel' => 'Linux',
				'architecture' => 'arm',
				'bits' => 32,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '112.0.0.0',
				'engineversion' => '112.0.0.0',
				'type' => 'human',
				'category' => 'mobile'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch)' => [
				'type' => 'human',
				'category' => 'mobile',
				'platform' => 'Windows Phone',
				'platformversion' => '8.0',
				'kernel' => 'Windows NT',
				'bits' => 32,
				'architecture' => 'arm',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; ARM; RM-1010) AppleWebKit/537.36 (KHTML like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'arm',
				'bits' => 32,
				'browser' => 'Edge',
				'browserversion' => '14.14393',
				'engine' => 'Blink',
				'engineversion' => '51.0.2704.79'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testX86() {
		$strings = [
			'Mozilla/3.0 (x86 [en] Windows NT 5.1; Sun)' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'architecture' => 'Sun',
				'browser' => 'Mozilla',
				'browserversion' => '3.0',
				'language' => 'en'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}

	public function testSolaris() {
		$strings = [
			'Mozilla/5.0 (X11; U; SunOS sun4u; pl-PL; rv:1.8.1.6) Gecko/20071217 Firefox/52.7.3' => [
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
				'language' => 'pl-PL'
			],
			'Mozilla/5.0 (X11; U; SunOS i86pc; en-US; rv:1.9.1.9) Gecko/20100525 Firefox/3.5.9' => [
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
				'language' => 'en-US'
			],
			'Mozilla/5.0 (X11; SunOS i86pc; rv:102.0) Gecko/20100101 Thunderbird/102.6.0' => [
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
				'language' => 'en-GB'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}
}