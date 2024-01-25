<?php
declare(strict_types = 1);
use hexydec\agentzero\agentzero;

final class browsersTest extends \PHPUnit\Framework\TestCase {

	public function testIEMobile() : void {
		$strings = [
			'Mozilla/5.0 (Mobile; Windows Phone 8.1; Android 4.0; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; NOKIA; Lumia 929) like iPhone OS 7_0_3 Mac OS X AppleWebKit/537 (KHTML, like Gecko) Mobile Safari/537' => [
				'string' => 'Mozilla/5.0 (Mobile; Windows Phone 8.1; Android 4.0; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; NOKIA; Lumia 929) like iPhone OS 7_0_3 Mac OS X AppleWebKit/537 (KHTML, like Gecko) Mobile Safari/537',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Nokia',
				'device' => 'Lumia',
				'model' => '929',
				'platform' => 'Windows Phone',
				'platformversion' => '8.1',
				'kernel' => 'Windows NT',
				'architecture' => 'arm',
				'bits' => 32,
				'engine' => 'Trident',
				'engineversion' => '7.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '11.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testOperaMini() : void {
		$strings = [
			'Opera/9.80 (SpreadTrum; Opera Mini/4.4.33961/191.286; U; en) Presto/2.12.423 Version/12.16' => [
				'string' => 'Opera/9.80 (SpreadTrum; Opera Mini/4.4.33961/191.286; U; en) Presto/2.12.423 Version/12.16',
				'platformversion' => '12.16',
				'type' => 'human',
				'category' => 'mobile',
				'processor' => 'Unisoc',
				'engine' => 'Presto',
				'engineversion' => '2.12.423',
				'browser' => 'Opera Mini',
				'browserversion' => '4.4.33961/191.286',
				'language' => 'en'
			],
			'Opera/9.80 (Android; Opera Mini/7.7.40394/191.293; U; en) Presto/2.12.423 Version/12.16' => [
				'string' => 'Opera/9.80 (Android; Opera Mini/7.7.40394/191.293; U; en) Presto/2.12.423 Version/12.16',
				'platform' => 'Android',
				'platformversion' => '12.16',
				'engine' => 'Presto',
				'engineversion' => '2.12.423',
				'type' => 'human',
				'browser' => 'Opera Mini',
				'browserversion' => '7.7.40394/191.293',
				'language' => 'en'
			],
			'Opera/9.80 (MAUI Runtime; Opera Mini/4.4.33576/191.308; U; en) Presto/2.12.423 Version/12.16' => [
				'string' => 'Opera/9.80 (MAUI Runtime; Opera Mini/4.4.33576/191.308; U; en) Presto/2.12.423 Version/12.16',
				'type' => 'human',
				'framework' => 'MAUI',
				'platformversion' => '12.16',
				'engine' => 'Presto',
				'engineversion' => '2.12.423',
				'browser' => 'Opera Mini',
				'browserversion' => '4.4.33576/191.308',
				'language' => 'en'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testOpera() : void {
		$strings = [
			'Opera/9.30 (Nintendo Wii; U; ; 2047-7; en)' => [
				'string' => 'Opera/9.30 (Nintendo Wii; U; ; 2047-7; en)',
				'device' => 'Wii',
				'vendor' => 'Nintendo',
				'type' => 'human',
				'category' => 'console',
				'browser' => 'Opera',
				'browserversion' => '9.30',
				'engine' => 'Presto',
				'engineversion' => '9.30',
				'language' => 'en'
			],
			'Opera/9.80 (J2ME/MIDP; Opera Mini/4.2.13918/191.286; U; en) Presto/2.12.423 Version/12.16' => [
				'string' => 'Opera/9.80 (J2ME/MIDP; Opera Mini/4.2.13918/191.286; U; en) Presto/2.12.423 Version/12.16',
				'type' => 'human',
				'category' => 'mobile',
				'kernel' => 'Java VM',
				'platform' => 'J2ME/MIDP',
				'platformversion' => '12.16',
				'engine' => 'Presto',
				'engineversion' => '2.12.423',
				'browser' => 'Opera Mini',
				'browserversion' => '4.2.13918/191.286',
				'language' => 'en'
			],
			'Opera/9.80 (X11; Linux zvav; U; en) Presto/2.12.423 Version/12.16' => [
				'string' => 'Opera/9.80 (X11; Linux zvav; U; en) Presto/2.12.423 Version/12.16',
				'kernel' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Linux',
				'platformversion' => '12.16',
				'engine' => 'Presto',
				'engineversion' => '2.12.423',
				'browser' => 'Opera',
				'browserversion' => '9.80',
				'language' => 'en'
			],
			'Opera/9.80 (Windows NT 6.1; U; en-GB) Presto/2.7.62 Version/11.00' => [
				'string' => 'Opera/9.80 (Windows NT 6.1; U; en-GB) Presto/2.7.62 Version/11.00',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Presto',
				'engineversion' => '2.7.62',
				'browser' => 'Opera',
				'browserversion' => '9.80',
				'language' => 'en-GB'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testChrome() : void {
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
				'engineversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (Linux; Android 10; SM-G770F Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/397.0.0.23.404;]' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10; SM-G770F Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/397.0.0.23.404;]',
				'app' => 'Facebook',
				'appname' => 'FB4A',
				'appversion' => '397.0.0.23.404',
				'vendor' => 'Samsung',
				'model' => 'SM-G770F',
				'build' => 'QP1A.190711.020',
				'platform' => 'Android',
				'platformversion' => '10',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.5359.128',
				'engineversion' => '108.0.5359.128',
				'type' => 'human',
				'category' => 'mobile'
			],
			'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8.1',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '44.0.2403.157',
				'engineversion' => '44.0.2403.157'
			],
			'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 5 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko; googleweblight) Chrome/38.0.1025.166 Mobile Safari/535.19' => [
				'string' => 'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 5 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko; googleweblight) Chrome/38.0.1025.166 Mobile Safari/535.19',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5',
				'build' => 'JOP40D',
				'proxy' => 'googleweblight',
				'platform' => 'Android',
				'platformversion' => '4.2.1',
				'kernel' => 'Linux',
				'engine' => 'WebKit',
				'engineversion' => '535.19',
				'browser' => 'Chrome',
				'browserversion' => '38.0.1025.166',
				'type' => 'human',
				'category' => 'mobile',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/535.22 (KHTML, like Gecko) Chrome/19.0.1047.0 Safari/535.22' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/535.22 (KHTML, like Gecko) Chrome/19.0.1047.0 Safari/535.22',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.7.3',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'engine' => 'WebKit',
				'engineversion' => '535.22',
				'browser' => 'Chrome',
				'browserversion' => '19.0.1047.0'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.28.3 (KHTML, like Gecko) Version/3.2.3 ChromePlus/4.0.222.3 Chrome/4.0.222.3 Safari/525.28.3' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.28.3 (KHTML, like Gecko) Version/3.2.3 ChromePlus/4.0.222.3 Chrome/4.0.222.3 Safari/525.28.3',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'WebKit',
				'engineversion' => '525.28.3',
				'browser' => 'Chrome',
				'browserversion' => '4.0.222.3',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testFirefox() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '41.0',
				'engineversion' => '41.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '106.0',
				'engineversion' => '106.0'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1b2) Gecko/20060821 Firefox/2.0b2' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1b2) Gecko/20060821 Firefox/2.0b2',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Gecko',
				'engineversion' => '20060821',
				'browser' => 'Firefox',
				'browserversion' => '2.0b2',
				'language' => 'en-GB'
			],
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
				'engineversion' => '28.0'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.9.1b3pre) Gecko/20090105 Firefox/52.4.1' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.9.1b3pre) Gecko/20090105 Firefox/52.4.1',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Gecko',
				'engineversion' => '20090105',
				'browser' => 'Firefox',
				'browserversion' => '52.4.1',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0,GingerClient/2.14.0-RELEASE' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0,GingerClient/2.14.0-RELEASE',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Gecko',
				'engineversion' => '103.0',
				'browser' => 'Firefox',
				'browserversion' => '103.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testSafari() : void {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.1 Safari/605.1.15' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.1 Safari/605.1.15',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.15.7',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '15.1'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'AppleBot',
				'appname' => 'Applebot',
				'appversion' => '0.1',
				'url' => 'http://www.apple.com/go/applebot',
				'device' => 'Macintosh',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.15.5',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '13.1.1'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/243.0.495136164 Mobile/15E148 Safari/604.1' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/243.0.495136164 Mobile/15E148 Safari/604.1',
				'app' => 'Google',
				'appname' => 'GSA',
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
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testBrave() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 13 QPR5; SM-S918U1) AppleWebKit/606.2.15 (KHTML, like Gecko) Brave/113.0.5672.92 Mobile Safari/606.2.15' => [
				'string' => 'Mozilla/5.0 (Linux; Android 13 QPR5; SM-S918U1) AppleWebKit/606.2.15 (KHTML, like Gecko) Brave/113.0.5672.92 Mobile Safari/606.2.15',
				'platform' => 'Android',
				'platformversion' => '13',
				'vendor' =>'Samsung',
				'model' => 'SM-S918U1',
				'kernel' => 'Linux',
				'engine' => 'WebKit',
				'engineversion' => '606.2.15',
				'browser' => 'Brave',
				'browserversion' => '113.0.5672.92',
				'type' => 'human',
				'category' => 'mobile'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_4 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Brave/1.2.11 Mobile/13G35 Safari/601.1.46' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_4 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Brave/1.2.11 Mobile/13G35 Safari/601.1.46',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '9.3.4',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '13G35',
				'engine' => 'WebKit',
				'engineversion' => '601.1.46',
				'browser' => 'Brave',
				'browserversion' => '1.2.11'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 13_4_1) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/115.0.0.0 Safari/605.1.15' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 13_4_1) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/115.0.0.0 Safari/605.1.15',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '13.4.1',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Brave',
				'browserversion' => '115.0.0.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testVivaldi() : void {
		$strings = [
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68',
				'kernel' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Vivaldi',
				'browserversion' => '5.3.2679.68',
				'engine' => 'Blink',
				'engineversion' => '103.0.0.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Vivaldi',
				'browserversion' => '5.3.2679.68',
				'engine' => 'Blink',
				'engineversion' => '103.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '12.5',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'Vivaldi',
				'browserversion' => '5.3.2679.68',
				'engine' => 'Blink',
				'engineversion' => '103.0.0.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testMaxthon() : void {
		$strings = [
			'Mozilla/5.0 (Windows; U; Windows NT 6.1; ) AppleWebKit/534.12 (KHTML, like Gecko) Maxthon/3.0 Safari/534.12' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; ) AppleWebKit/534.12 (KHTML, like Gecko) Maxthon/3.0 Safari/534.12',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'WebKit',
				'engineversion' => '534.12',
				'browser' => 'Maxthon',
				'browserversion' => '3.0'
			],
			'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36 Maxthon/5.2.7.5000' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36 Maxthon/5.2.7.5000',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8.1',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Maxthon',
				'browserversion' => '5.2.7.5000',
				'engine' => 'Blink',
				'engineversion' => '61.0.3163.79'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36 Maxthon/5.2.1.6000' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36 Maxthon/5.2.1.6000',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Maxthon',
				'browserversion' => '5.2.1.6000',
				'engine' => 'Blink',
				'engineversion' => '61.0.3163.79'
			],
			'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Maxthon 2.0)' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Maxthon 2.0)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'browser' => 'Maxthon',
				'browserversion' => '2.0',
				'engine' => 'Trident'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testKonqueror() : void {
		$strings = [
			'Mozilla/5.0 (compatible; Konqueror/3; Linux)' => [
				'string' => 'Mozilla/5.0 (compatible; Konqueror/3; Linux)',
				'type' => 'human',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'browser' => 'Konqueror',
				'browserversion' => '3'
			],
			'Mozilla/5.0 (compatible; Konqueror/3.5; Linux; en_US) KHTML/3.5.6 (like Gecko) (Kubuntu)' => [
				'string' => 'Mozilla/5.0 (compatible; Konqueror/3.5; Linux; en_US) KHTML/3.5.6 (like Gecko) (Kubuntu)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Kubuntu',
				'browser' => 'Konqueror',
				'browserversion' => '3.5',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (compatible; Konqueror/3.1; i686 Linux; 20021102)' => [
				'string' => 'Mozilla/5.0 (compatible; Konqueror/3.1; i686 Linux; 20021102)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Konqueror',
				'browserversion' => '3.1'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testIE() : void {
		$strings = [
			'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Trident',
				'browser' => 'Internet Explorer',
				'browserversion' => '6.0'
			],
			'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729)' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Trident',
				'engineversion' => '4.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '8.0'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0'
			],
			'Mozilla/5.0 (compatible; MSIE 11.0; Windows NT 6.1; Trident/7.0; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E)' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 11.0; Windows NT 6.1; Trident/7.0; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '7.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '11.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
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
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testKmeleon() : void {
		$strings = [
			'Mozilla/5.0 (Windows; U; WinNT4.0; en-US; rv:1.8.0.5) Gecko/20060706 K-Meleon/1.0' => [
				'string' => 'Mozilla/5.0 (Windows; U; WinNT4.0; en-US; rv:1.8.0.5) Gecko/20060706 K-Meleon/1.0',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '4.0',
				'engine' => 'Gecko',
				'engineversion' => '20060706',
				'browser' => 'K-Meleon',
				'browserversion' => '1.0',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:21.0) Gecko/20100101 K-meleon/88.0' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:21.0) Gecko/20100101 K-meleon/88.0',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.9',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'K-Meleon',
				'browserversion' => '88.0'
			],
			'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20160222 Firefox/38.8 K-Meleon/76.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20160222 Firefox/38.8 K-Meleon/76.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Gecko',
				'engineversion' => '20160222',
				'browser' => 'K-Meleon',
				'browserversion' => '76.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testUCBrowser() : void {
		$strings = [
			'Mozilla/5.0 (Linux; U; Android 10; en-US; SCV39 Build/QP1A.190711.020) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 UCBrowser/13.4.0.1306 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; U; Android 10; en-US; SCV39 Build/QP1A.190711.020) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 UCBrowser/13.4.0.1306 Mobile Safari/537.36',
				'model' => 'SCV39',
				'build' => 'QP1A.190711.020',
				'platform' => 'Android',
				'platformversion' => '10',
				'kernel' => 'Linux',
				'browser' => 'UCBrowser',
				'browserversion' => '13.4.0.1306',
				'engine' => 'Blink',
				'engineversion' => '78.0.3904.108',
				'type' => 'human',
				'category' => 'mobile',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30' => [
				'string' => 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30',
				'vendor' => 'Xiaomi',
				'device' => 'HM',
				'model' => 'NOTE 1W',
				'build' => 'KOT49H',
				'platform' => 'Android',
				'platformversion' => '4.4.2',
				'kernel' => 'Linux',
				'engine' => 'WebKit',
				'engineversion' => '534.30',
				'browser' => 'UCBrowser',
				'browserversion' => '11.0.5.850',
				'type' => 'human',
				'category' => 'mobile',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Linux; U; Android 12; en-US; 22041216I Build/SP1A.210812.016) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 UCBrowser/13.4.0.1306 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; U; Android 12; en-US; 22041216I Build/SP1A.210812.016) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 UCBrowser/13.4.0.1306 Mobile Safari/537.36',
				'model' => '22041216I',
				'build' => 'SP1A.210812.016',
				'platform' => 'Android',
				'platformversion' => '12',
				'kernel' => 'Linux',
				'browser' => 'UCBrowser',
				'browserversion' => '13.4.0.1306',
				'engine' => 'Blink',
				'engineversion' => '78.0.3904.108',
				'type' => 'human',
				'category' => 'mobile',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testPaleMoon() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:38.9) Gecko/20100101 Goanna/2.1 Firefox/38.9 PaleMoon/26.3.3' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:38.9) Gecko/20100101 Goanna/2.1 Firefox/38.9 PaleMoon/26.3.3',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Goanna',
				'engineversion' => '2.1',
				'browser' => 'PaleMoon',
				'browserversion' => '26.3.3'
			],
			'Mozilla/5.0 (Windows NT 6.1; rv:3.4) Goanna/20180327 PaleMoon/27.8.3' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; rv:3.4) Goanna/20180327 PaleMoon/27.8.3',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Goanna',
				'engineversion' => '20180327',
				'browser' => 'PaleMoon',
				'browserversion' => '27.8.3'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:52.9) Gecko/20100101 Goanna/3.4 Firefox/52.9 PaleMoon/27.9.2' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64; rv:52.9) Gecko/20100101 Goanna/3.4 Firefox/52.9 PaleMoon/27.9.2',
				'kernel' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Goanna',
				'engineversion' => '3.4',
				'browser' => 'PaleMoon',
				'browserversion' => '27.9.2'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:60.9) Gecko/20100101 Goanna/4.1 Firefox/60.9 PaleMoon/28.4.1' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:60.9) Gecko/20100101 Goanna/4.1 Firefox/60.9 PaleMoon/28.4.1',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '10.12',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'engine' => 'Goanna',
				'engineversion' => '4.1',
				'browser' => 'PaleMoon',
				'browserversion' => '28.4.1'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testBasilisk() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:102.0) Gecko/20100101 Goanna/5.2 Firefox/102.0 Basilisk/20221104' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:102.0) Gecko/20100101 Goanna/5.2 Firefox/102.0 Basilisk/20221104',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Goanna',
				'engineversion' => '5.2',
				'browser' => 'Basilisk',
				'browserversion' => '20221104'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Goanna/4.8 Firefox/68.0 Basilisk/20220127' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Goanna/4.8 Firefox/68.0 Basilisk/20220127',
				'type' => 'human',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Goanna',
				'engineversion' => '4.8',
				'browser' => 'Basilisk',
				'browserversion' => '20220127'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Goanna/4.8 Firefox/68.0 Basilisk/52.9.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Goanna/4.8 Firefox/68.0 Basilisk/52.9.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Goanna',
				'engineversion' => '4.8',
				'browser' => 'Basilisk',
				'browserversion' => '52.9.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testIceweasel() : void {
		$strings = [
			'Mozilla/5.0 (X11; Linux x86_64; rv:5.0) Gecko/20100101 Firefox/5.0 Iceweasel/5.0' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64; rv:5.0) Gecko/20100101 Firefox/5.0 Iceweasel/5.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'IceWeasel',
				'browserversion' => '5.0',
				'engine' => 'Gecko',
				'engineversion' => '5.0'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1) Gecko/20061024 Iceweasel/2.0 (Debian-2.0+dfsg-1)' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1) Gecko/20061024 Iceweasel/2.0 (Debian-2.0+dfsg-1)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Debian',
				'platformversion' => '2.0+dfsg-1',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '20061024',
				'browser' => 'IceWeasel',
				'browserversion' => '2.0',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0 Iceweasel/009654' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0 Iceweasel/009654',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'IceWeasel',
				'browserversion' => '009654',
				'engine' => 'Gecko',
				'engineversion' => '38.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testIcecat() : void {
		$strings = [
			'Mozilla/5.0 (X11; U; Linux sparc64; es-PY; rv:5.0) Gecko/20100101 IceCat/5.0 (like Firefox/5.0; Debian-6.0.1)' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux sparc64; es-PY; rv:5.0) Gecko/20100101 IceCat/5.0 (like Firefox/5.0; Debian-6.0.1)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Debian',
				'platformversion' => '6.0.1',
				'processor' => 'Fujitsu',
				'architecture' => 'Spark V9',
				'bits' => 64,
				'browser' => 'IceCat',
				'browserversion' => '5.0',
				'engine' => 'Gecko',
				'engineversion' => '5.0',
				'language' => 'es-PY'
			],
			'Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.2.13) Gecko/20101214 IceCat/3.6.13 (like Firefox/3.6.13)' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.2.13) Gecko/20101214 IceCat/3.6.13 (like Firefox/3.6.13)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Gecko',
				'engineversion' => '20101214',
				'browser' => 'IceCat',
				'browserversion' => '3.6.13',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:17.0) Gecko/20121201 icecat/17.0.1' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64; rv:17.0) Gecko/20121201 icecat/17.0.1',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'Gecko',
				'engineversion' => '20121201',
				'browser' => 'IceCat',
				'browserversion' => '17.0.1'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testSeaMonkey() : void {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 12.6; rv:91.0) Gecko/20100101 SeaMonkey/2.53.16' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12.6; rv:91.0) Gecko/20100101 SeaMonkey/2.53.16',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '12.6',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'SeaMonkey',
				'browserversion' => '2.53.16'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 12.6; rv:91.0) Gecko/20100101 Firefox/91.0 SeaMonkey/2.53.15' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12.6; rv:91.0) Gecko/20100101 Firefox/91.0 SeaMonkey/2.53.15',
				'device' => 'Macintosh',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'platform' => 'Mac OS X',
				'platformversion' => '12.6',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'browser' => 'SeaMonkey',
				'browserversion' => '2.53.15',
				'engine' => 'Gecko',
				'engineversion' => '91.0'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 SeaMonkey/2.53.10.2' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 SeaMonkey/2.53.10.2',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'SeaMonkey',
				'browserversion' => '2.53.10.2'
			],
			'Mozilla/5.0 (Windows NT 5.1; rv:7.0) Gecko/20110923 Firefox/7.0 SeaMonkey/2.4' => [
				'string' => 'Mozilla/5.0 (Windows NT 5.1; rv:7.0) Gecko/20110923 Firefox/7.0 SeaMonkey/2.4',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Gecko',
				'engineversion' => '20110923',
				'browser' => 'SeaMonkey',
				'browserversion' => '2.4'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testNetscape() : void {
		$strings = [
			'Mozilla/5.0 (X11; AmigaOS x86_64) (KHTML, somewhat like Gecko) Netscape/69.42.13' => [
				'string' => 'Mozilla/5.0 (X11; AmigaOS x86_64) (KHTML, somewhat like Gecko) Netscape/69.42.13',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Exec',
				'platform' => 'AmigaOS',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Netscape',
				'browserversion' => '69.42.13'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:65.0) Gecko/20100101 Netscape/65.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:65.0) Gecko/20100101 Netscape/65.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Netscape',
				'browserversion' => '65.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Netscape/102.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Netscape/102.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Netscape',
				'browserversion' => '102.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testWebPositive() : void {
		$strings = [
			'Mozilla/5.0 (compatible; U; WebPositive/533.4; Haiku) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.55 Safari/533.4' => [
				'string' => 'Mozilla/5.0 (compatible; U; WebPositive/533.4; Haiku) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.55 Safari/533.4',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Haiku',
				'platform' => 'Haiku',
				'engine' => 'WebKit',
				'engineversion' => '533.4',
				'browser' => 'WebPositive',
				'browserversion' => '533.4'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:89.0) Gecko/20100101 WebPositive/89.0' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:89.0) Gecko/20100101 WebPositive/89.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'WebPositive',
				'browserversion' => '89.0'
			],
			'Mozilla/5.0 (compatible; U; Haiku x86; pt-BR) AppleWebKit/536.10 (KHTML, like Gecko) Haiku/R1 WebPositive/1.1 Safari/536.10' => [
				'string' => 'Mozilla/5.0 (compatible; U; Haiku x86; pt-BR) AppleWebKit/536.10 (KHTML, like Gecko) Haiku/R1 WebPositive/1.1 Safari/536.10',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Haiku',
				'architecture' => 'x86',
				'bits' => 32,
				'platform' => 'Haiku',
				'platformversion' => 'R1',
				'engine' => 'WebKit',
				'engineversion' => '536.10',
				'browser' => 'WebPositive',
				'browserversion' => '1.1',
				'language' => 'pt-BR'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testKNinja() : void {
		$strings = [
			'Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.1.4pre) Gecko/20070404 K-Ninja/2.1.3' => [
				'string' => 'Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.1.4pre) Gecko/20070404 K-Ninja/2.1.3',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'MS-DOS',
				'platform' => 'Windows',
				'platformversion' => '98',
				'engine' => 'Gecko',
				'engineversion' => '20070404',
				'browser' => 'K-Ninja',
				'browserversion' => '2.1.3',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.4pre) Gecko/20070404 K-Ninja/2.1.3' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.4pre) Gecko/20070404 K-Ninja/2.1.3',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Gecko',
				'engineversion' => '20070404',
				'browser' => 'K-Ninja',
				'browserversion' => '2.1.3',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.2pre) Gecko/20070215 K-Ninja/2.1.1' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.2pre) Gecko/20070215 K-Ninja/2.1.1',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Gecko',
				'engineversion' => '20070215',
				'browser' => 'K-Ninja',
				'browserversion' => '2.1.1',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testOculusBrowser() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 10; Quest 2) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/13.0.0.2.16.259832224 SamsungBrowser/4.0 Chrome/87.0.4280.66 VR Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10; Quest 2) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/13.0.0.2.16.259832224 SamsungBrowser/4.0 Chrome/87.0.4280.66 VR Safari/537.36',
				'vendor' => 'Oculus',
				'device' => 'Quest',
				'model' => '2',
				'type' => 'human',
				'category' => 'vr',
				'platform' => 'Android',
				'platformversion' => '10',
				'kernel' => 'Linux',
				'browser' => 'Samsung Browser',
				'browserversion' => '4.0',
				'app' => 'Oculus Browser',
				'appname' => 'OculusBrowser',
				'appversion' => '13.0.0.2.16.259832224',
				'engine' => 'Blink',
				'engineversion' => '87.0.4280.66'
			],
			'Mozilla/5.0 (Linux; Android 10; Quest) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/19.1.0.1.50.350517500 SamsungBrowser/4.0 Chrome/96.0.4664.174 Mobile VR Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10; Quest) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/19.1.0.1.50.350517500 SamsungBrowser/4.0 Chrome/96.0.4664.174 Mobile VR Safari/537.36',
				'vendor' => 'Oculus',
				'device' => 'Quest',
				'type' => 'human',
				'category' => 'vr',
				'platform' => 'Android',
				'platformversion' => '10',
				'kernel' => 'Linux',
				'browser' => 'Samsung Browser',
				'browserversion' => '4.0',
				'app' => 'Oculus Browser',
				'appname' => 'OculusBrowser',
				'appversion' => '19.1.0.1.50.350517500',
				'engine' => 'Blink',
				'engineversion' => '96.0.4664.174'
			],
			'Mozilla/5.0 (Linux; Android 7.1.1; Pacific) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/9.2.0.2.122.217074189 SamsungBrowser/4.0 Chrome/81.0.4044.117 Mobile VR Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.1.1; Pacific) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/9.2.0.2.122.217074189 SamsungBrowser/4.0 Chrome/81.0.4044.117 Mobile VR Safari/537.36',
				'type' => 'human',
				'category' => 'vr',
				'platform' => 'Android',
				'platformversion' => '7.1.1',
				'vendor' => 'Oculus',
				'device' => 'Go',
				'kernel' => 'Linux',
				'browser' => 'Samsung Browser',
				'browserversion' => '4.0',
				'app' => 'Oculus Browser',
				'appname' => 'OculusBrowser',
				'appversion' => '9.2.0.2.122.217074189',
				'engine' => 'Blink',
				'engineversion' => '81.0.4044.117'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testSamsungBrowser() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 12; SAMSUNG SM-S908E) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/19.0 Chrome/102.0.5005.125 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 12; SAMSUNG SM-S908E) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/19.0 Chrome/102.0.5005.125 Mobile Safari/537.36',
				 'type' => 'human',
				 'category' => 'mobile',
				 'platform' => 'Android',
				 'platformversion' => '12',
				 'vendor' => 'Samsung',
				 'model' => 'SM-S908E',
				 'kernel' => 'Linux',
				 'browser' => 'Samsung Browser',
				 'browserversion' => '19.0',
				 'engine' => 'Blink',
				 'engineversion' => '102.0.5005.125'
			],
			'Mozilla/5.0 (Linux; Android 8.1.0; SAMSUNG SM-A260G Build/OPR6; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 SamsungBrowser/7.2 Chrome/108.0.5359.128 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 8.1.0; SAMSUNG SM-A260G Build/OPR6; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 SamsungBrowser/7.2 Chrome/108.0.5359.128 Mobile Safari/537.36',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'model' => 'SM-A260G',
				'build' => 'OPR6',
				'platform' => 'Android',
				'platformversion' => '8.1.0',
				'kernel' => 'Linux',
				'browser' => 'Samsung Browser',
				'browserversion' => '7.2',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.128'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testNintendoBrowser() : void {
		$strings = [
			'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.12 NintendoBrowser/7.1.2.EU' => [
				'string' => 'Mozilla/5.0 (Nintendo WiiU) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.12 NintendoBrowser/7.1.2.EU',
				'vendor' => 'Nintendo',
				'device' => 'Wii U',
				'type' => 'human',
				'category' => 'console',
				'engine' => 'WebKit',
				'engineversion' => '536.30',
				'browser' => 'NintendoBrowser',
				'browserversion' => '7.1.2.EU',
				'architecture' => 'PowerPC'
			],
			'Mozilla/5.0 (Nintendo 3DS) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.12 NintendoBrowser/7.1.2.US' => [
				'string' => 'Mozilla/5.0 (Nintendo 3DS) AppleWebKit/536.30 (KHTML, like Gecko) NX/3.0.4.2.12 NintendoBrowser/7.1.2.US',
				'vendor' => 'Nintendo',
				'device' => '3DS',
				'type' => 'human',
				'category' => 'console',
				'engine' => 'WebKit',
				'engineversion' => '536.30',
				'browser' => 'NintendoBrowser',
				'browserversion' => '7.1.2.US'
			],
			'Mozilla/5.0 (Nintendo Switch; WifiWebAuthApplet) AppleWebKit/601.6 (KHTML, like Gecko) NF/4.0.0.12.4 NintendoBrowser/5.1.0.19293' => [
				'string' => 'Mozilla/5.0 (Nintendo Switch; WifiWebAuthApplet) AppleWebKit/601.6 (KHTML, like Gecko) NF/4.0.0.12.4 NintendoBrowser/5.1.0.19293',
				'app' => 'WifiWebAuthApplet',
				'appname' => 'WifiWebAuthApplet',
				'vendor' => 'Nintendo',
				'device' => 'Switch',
				'type' => 'human',
				'category' => 'console',
				'engine' => 'WebKit',
				'engineversion' => '601.6',
				'browser' => 'NintendoBrowser',
				'browserversion' => '5.1.0.19293'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testEpiphany() : void {
		$strings = [
			'Mozilla/5.0 (X11; Ubuntu x86_64; System76) AppleWebKit/610.4.3.1.7 (KHTML, like Gecko) Version/15.4 Safari/610.4.3.1.7 POP_OS/22.04 Epiphany/610.4.3.1.7' => [
				'string' => 'Mozilla/5.0 (X11; Ubuntu x86_64; System76) AppleWebKit/610.4.3.1.7 (KHTML, like Gecko) Version/15.4 Safari/610.4.3.1.7 POP_OS/22.04 Epiphany/610.4.3.1.7',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'platformversion' => '15.4',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'WebKit',
				'engineversion' => '610.4.3.1.7',
				'browser' => 'Epiphany',
				'browserversion' => '610.4.3.1.7'
			],
			'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Safari/605.1.15 Epiphany/605.1.15' => [
				'string' => 'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Safari/605.1.15 Epiphany/605.1.15',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '11.0',
				'architecture' => 'arm',
				'bits' => 64,
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Epiphany',
				'browserversion' => '605.1.15'
			],
			'Mozilla/5.0 (X11; Fedora; Linux i686) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Safari/605.1.15 Epiphany/605.1.15' => [
				'string' => 'Mozilla/5.0 (X11; Fedora; Linux i686) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Safari/605.1.15 Epiphany/605.1.15',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Fedora',
				'platformversion' => '13.0',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Epiphany',
				'browserversion' => '605.1.15'
			],
			'Mozilla/5.0 (X11; U; Linux; i686; en-US; rv:1.6) Gecko Epiphany/1.2.5' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux; i686; en-US; rv:1.6) Gecko Epiphany/1.2.5',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'browser' => 'Epiphany',
				'browserversion' => '1.2.5',
				'engine' => 'Gecko',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testSilk() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 9; KFMAWI) AppleWebKit/537.36 (KHTML, like Gecko) Silk/117.0.6 like Chrome/117.0.5878.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; KFMAWI) AppleWebKit/537.36 (KHTML, like Gecko) Silk/117.0.6 like Chrome/117.0.5878.0 Safari/537.36',
				'platform' => 'Android',
				'platformversion' => '9',
				'vendor' => 'Amazon',
				'device' => 'Fire Tablet',
				'model' => 'KFMAWI',
				'type' => 'human',
				'category' => 'tablet',
				'kernel' => 'Linux',
				'browser' => 'Silk',
				'browserversion' => '117.0.6',
				'engine' => 'Blink',
				'engineversion' => '117.0.5878.0'
			],
			'Mozilla/5.0 (Linux; Android 9; KFONWI) AppleWebKit/537.36 (KHTML, like Gecko) Silk/117.0.6 like Chrome/117.0.5878.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; KFONWI) AppleWebKit/537.36 (KHTML, like Gecko) Silk/117.0.6 like Chrome/117.0.5878.0 Safari/537.36',
				'platform' => 'Android',
				'platformversion' => '9',
				'vendor' => 'Amazon',
				'device' => 'Fire Tablet',
				'model' => 'KFONWI',
				'type' => 'human',
				'category' => 'tablet',
				'kernel' => 'Linux',
				'browser' => 'Silk',
				'browserversion' => '117.0.6',
				'engine' => 'Blink',
				'engineversion' => '117.0.5878.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.5259.39 Safari/537.36 Silk/148.0.5259.39' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.5259.39 Safari/537.36 Silk/148.0.5259.39',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Silk',
				'browserversion' => '148.0.5259.39',
				'engine' => 'Blink',
				'engineversion' => '148.0.5259.39'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testNetFront() : void {
		$strings = [
			'SAMSUNG-SGH-A867/A867UCHJ3 SHP/VPP/R5 NetFront/35 SMM-MMS/19.2.0 profile/MIDP-2.0 configuration/CLDC-1.1 UP.Link/6.3.0.0.0' => [
				'string' => 'SAMSUNG-SGH-A867/A867UCHJ3 SHP/VPP/R5 NetFront/35 SMM-MMS/19.2.0 profile/MIDP-2.0 configuration/CLDC-1.1 UP.Link/6.3.0.0.0',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'model' => 'SGH-A867',
				'build' => 'A867UCHJ3',
				'browser' => 'NetFront',
				'browserversion' => '35'
			],
			'SonyEricssonK310iv/R4DA Browser/NetFront/93.3 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Link/6.3.1.13.0(Linux LLC 1.2)' => [
				'string' => 'SonyEricssonK310iv/R4DA Browser/NetFront/93.3 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Link/6.3.1.13.0(Linux LLC 1.2)',
				'model' => 'K310iv',
				'vendor' => 'Sony Ericsson',
				'build' => 'R4DA',
				'type' => 'human',
				'category' => 'mobile',
				'kernel' => 'Linux',
				'platform' => 'Linux'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testFennec() : void {
		$strings = [
			'Mozilla/5.0 (Android; Linux armv7l; rv:5.0) Gecko/20110615 Firefox/5.0 Fennec/142' => [
				'string' => 'Mozilla/5.0 (Android; Linux armv7l; rv:5.0) Gecko/20110615 Firefox/5.0 Fennec/142',
				'platform' => 'Android',
				'type' => 'human',
				'kernel' => 'Linux',
				'architecture' => 'arm',
				'bits' => 32,
				'engine' => 'Gecko',
				'engineversion' => '20110615',
				'browser' => 'Fennec',
				// 'category' => 'tablet',
				'browserversion' => '142'
			],
			'Mozilla/5.0 (Wayland; Linux i686; rv:31.0) Gecko/20100101 Fennec/31.0' => [
				'string' => 'Mozilla/5.0 (Wayland; Linux i686; rv:31.0) Gecko/20100101 Fennec/31.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 32,
				'browser' => 'Fennec',
				'engine' => 'Gecko',
				'browserversion' => '31.0',
				'engineversion' => '31.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testEdge() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.19582' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.19582',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '18.19582',
				'engine' => 'Blink',
				'engineversion' => '70.0.3538.102'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '12.246',
				'engine' => 'Blink',
				'engineversion' => '42.0.2311.135'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.76' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.76',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '108.0.1462.76',
				'engine' => 'Blink',
				'engineversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) EdgiOS/108.0.1462.62 Version/16.0 Mobile/15E148 Safari/604.1' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) EdgiOS/108.0.1462.62 Version/16.0 Mobile/15E148 Safari/604.1',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.1',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Edge',
				'browserversion' => '108.0.1462.62'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox One) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.22621' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox One) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.22621',
				'device' => 'Xbox',
				'model' => 'One',
				'type' => 'human',
				'category' => 'console',
				'vendor' => 'Microsoft',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Edge',
				'browserversion' => '18.22621',
				'engine' => 'Blink',
				'engineversion' => '70.0.3538.102'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testQQBrowser() : void {
		$strings = [
			'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.3; .NET4.0C; .NET4.0E) QQBrowser/6.9.11079.201' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.3; .NET4.0C; .NET4.0E) QQBrowser/6.9.11079.201',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '5.0',
				'browser' => 'QQ Browser',
				'browserversion' => '6.9.11079.201'
			],
			'Mozilla/5.0 (Linux; Android 7.1.1; vivo X20A Build/NMF26X; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/6.2 TBS/044304 Mobile Safari/537.36 MicroMessenger/6.7.2.1340(0x2607023A) NetType/4G Language/zh_CN' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.1.1; vivo X20A Build/NMF26X; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/6.2 TBS/044304 Mobile Safari/537.36 MicroMessenger/6.7.2.1340(0x2607023A) NetType/4G Language/zh_CN',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Vivo',
				'model' => 'X20A',
				'build' => 'NMF26X',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '7.1.1',
				'engine' => 'Blink',
				'engineversion' => '57.0.2987.132',
				'browser' => 'QQ Browser',
				'browserversion' => '6.2',
				'language' => 'zh-CN',
				'app' => 'WeChat',
				'appname' => 'MicroMessenger',
				'appversion' => '6.7.2.1340',
				'nettype' => '4G'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36 Core/1.94.191.400 QQBrowser/11.5.5245.400' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36 Core/1.94.191.400 QQBrowser/11.5.5245.400',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '94.0.4606.71',
				'browser' => 'QQ Browser',
				'browserversion' => '11.5.5245.400'
			],
			'Mozilla/5.0 (Linux; U; Android 7.0; zh-cn; SM-C7000 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/8.6 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; U; Android 7.0; zh-cn; SM-C7000 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/8.6 Mobile Safari/537.36',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'model' => 'SM-C7000',
				'build' => 'NRD90M',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'engine' => 'Blink',
				'engineversion' => '57.0.2987.132',
				'browser' => 'QQ Browser',
				'browserversion' => '8.6',
				'language' => 'zh-CN'
			],
			'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0) Core/1.50.1414.400 QQBrowser/9.5.9244.400' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0) Core/1.50.1414.400 QQBrowser/9.5.9244.400',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '5.0',
				'browser' => 'QQ Browser',
				'browserversion' => '9.5.9244.400'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testChromium() : void {
		$strings = [
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.167 Chrome/64.0.3282.167 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.167 Chrome/64.0.3282.167 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chromium',
				'browserversion' => '64.0.3282.167',
				'engine' => 'Blink',
				'engineversion' => '64.0.3282.167'
			],
			'Mozilla/5.0 (X11; Linux armv7l) AppleWebKit/537.42 (KHTML, like Gecko) Chromium/25.0.1349.2 Chrome/25.0.1349.2 Safari/537.42' => [
				'string' => 'Mozilla/5.0 (X11; Linux armv7l) AppleWebKit/537.42 (KHTML, like Gecko) Chromium/25.0.1349.2 Chrome/25.0.1349.2 Safari/537.42',
				'type' => 'human',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'category' => 'desktop',
				'architecture' => 'arm',
				'bits' => 32,
				'engine' => 'WebKit',
				'engineversion' => '537.42',
				'browser' => 'Chromium',
				'browserversion' => '25.0.1349.2'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testOther() : void {
		$strings = [
			'Mozilla/5.0 (X11; U; Linux i686; ja-jp) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) midori 67' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux i686; ja-jp) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) midori 67',
				'kernel' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 32,
				'engine' => 'WebKit',
				'engineversion' => '525.1+',
				'browser' => 'Midori',
				'browserversion' => '67',
				'language' => 'ja-JP'
			],
			'Mozilla/5.0 (X11; U; Linux x86_64; en-gb) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) midori 359' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux x86_64; en-gb) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) midori 359',
				'kernel' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64,
				'engine' => 'WebKit',
				'engineversion' => '525.1+',
				'browser' => 'Midori',
				'browserversion' => '359',
				'language' => 'en-GB'
			],
			'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Midori/10.0.2 Chrome/98.0.4758.141 Electron/17.4.10 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Midori/10.0.2 Chrome/98.0.4758.141 Electron/17.4.10 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Midori',
				'browserversion' => '10.0.2',
				'engine' => 'Blink',
				'engineversion' => '98.0.4758.141',
				'framework' => 'Electron',
				'frameworkversion' => '17.4.10',
			],
			'Mozilla/5.0 (X11; Haiku x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Falkon/3.0.0 Chrome/83.0.4103.122 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (X11; Haiku x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Falkon/3.0.0 Chrome/83.0.4103.122 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Haiku',
				'platform' => 'Haiku',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Falkon',
				'browserversion' => '3.0.0',
				'engine' => 'Blink',
				'engineversion' => '83.0.4103.122'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Lynx/91.0.4467.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Lynx/91.0.4467.0 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'browser' => 'Lynx',
				'browserversion' => '91.0.4467.0',
				'engine' => 'Libwww'
			],
			'Mozilla/5.0 (X11; U; Linux arm7tdmi; rv:1.8.1.11) Gecko/20071130 Minimo/0.025' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux arm7tdmi; rv:1.8.1.11) Gecko/20071130 Minimo/0.025',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'arm',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'Gecko',
				'engineversion' => '20071130',
				'browser' => 'Minimo',
				'browserversion' => '0.025'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.12) Gecko/20080321 BonEcho/2.0.0.12 (SliTaz GNU/Linux)' => [
				'string' => 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.12) Gecko/20080321 BonEcho/2.0.0.12 (SliTaz GNU/Linux)',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'Gecko',
				'engineversion' => '20080321',
				'browser' => 'BonEcho',
				'browserversion' => '2.0.0.12',
				'language' => 'en-US'
			],
			'Links (2.3pre1; Linux 2.6.38-8-generic x86_64; 170x48)' => [
				'string' => 'Links (2.3pre1; Linux 2.6.38-8-generic x86_64; 170x48)',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '2.6.38-8-generic',
				'browser' => 'Links',
				'browserversion' => '2.3pre1',
				'width' => 170,
				'height' => 48
			],
			'ELinks (0.11.3; Linux 2.6.22-gentoo-r9 i686; 80x40)' => [
				'string' => 'ELinks (0.11.3; Linux 2.6.22-gentoo-r9 i686; 80x40)',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '2.6.22-gentoo-r9',
				'browser' => 'ELinks',
				'browserversion' => '0.11.3',
				'width' => 80,
				'height' => 40
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}