<?php
use hexydec\agentzero\agentzero;

final class enginesTest extends \PHPUnit\Framework\TestCase {

	public function testTrident() : void {
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
				'browserversion' => '9.0'
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
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testGecko() : void {
		$strings = [
			'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1b3) Gecko/20090305 Firefox/52.4.0' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1b3) Gecko/20090305 Firefox/52.4.0',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Gecko',
				'engineversion' => '20090305',
				'browser' => 'Firefox',
				'browserversion' => '52.4.0',
				'language' => 'en-US'
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
			'Mozilla/5.0 (Android 11; Mobile; rv:108.0) Gecko/108.0 Firefox/108.0' => [
				'string' => 'Mozilla/5.0 (Android 11; Mobile; rv:108.0) Gecko/108.0 Firefox/108.0',
				'type' => 'human',
				'platform' => 'Android',
				'platformversion' => '11',
				'engine' => 'Gecko',
				'engineversion' => '108.0',
				'browser' => 'Firefox',
				'browserversion' => '108.0',
				'category' => 'mobile'
			],
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
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testPresto() : void {
		$strings = [
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
			],
			'Opera/9.80 (SpreadTrum; Opera Mini/4.4.32739/191.293; U; en) Presto/2.12.423 Version/12.16' => [
				'string' => 'Opera/9.80 (SpreadTrum; Opera Mini/4.4.32739/191.293; U; en) Presto/2.12.423 Version/12.16',
				'platformversion' => '12.16',
				'type' => 'human',
				'category' => 'mobile',
				'processor' => 'Unisoc',
				'engine' => 'Presto',
				'engineversion' => '2.12.423',
				'browser' => 'Opera Mini',
				'browserversion' => '4.4.32739/191.293',
				'language' => 'en'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testWebkit() : void {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.1 Safari/605.1.15' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.1 Safari/605.1.15',
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
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '15.1'
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
			],
			'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 5 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko; googleweblight) Chrome/38.0.1025.166 Mobile Safari/535.19' => [
				'string' => 'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 5 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko; googleweblight) Chrome/38.0.1025.166 Mobile Safari/535.19',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5',
				'build' => 'JOP40D',
				'platform' => 'Android',
				'platformversion' => '4.2.1',
				'proxy' => 'googleweblight',
				'kernel' => 'Linux',
				'engine' => 'WebKit',
				'engineversion' => '535.19',
				'browser' => 'Chrome',
				'browserversion' => '38.0.1025.166',
				'type' => 'human',
				'category' => 'mobile',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testBlink() : void {
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
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '67.0.3396.99',
				'engineversion' => '67.0.3396.99'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.5249.119 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.5249.119 Safari/537.36',
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
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '106.0.5249.119',
				'engineversion' => '106.0.5249.119'
			],
			'Mozilla/5.0 (Linux; Android 11; motorola one 5G ace) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 11; motorola one 5G ace) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36',
				'platform' => 'Android',
				'platformversion' => '11',
				'vendor' => 'Motorola',
				'device' => 'One',
				'model' => '5G Ace',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'type' => 'human',
				'category' => 'mobile'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}