<?php
use hexydec\agentzero\agentzero;

final class platformsTest extends \PHPUnit\Framework\TestCase {

	public function testWindows() {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '110.0.0.0',
				'browserversion' => '110.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'browserversion' => '114.0.0.0',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '114.0',
				'browserversion' => '114.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '115.0',
				'browserversion' => '115.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '109.0.0.0',
				'browserversion' => '109.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.58' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.58',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 OPR/99.0.0.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Opera',
				'browserversion' => '99.0.0.0',
				'engine' => 'Blink',
				'engineversion' => '113.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.82',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '115.0.0.0',
				'browserversion' => '115.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '115.0',
				'engineversion' => '115.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.67',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; rv:114.0) Gecko/20100101 Firefox/114.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '114.0',
				'browserversion' => '114.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.0.0',
				'engineversion' => '113.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Firefox/102.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '102.0',
				'browserversion' => '102.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.51' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.51',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.79',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; rv:102.0) Gecko/20100101 Firefox/102.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '102.0',
				'browserversion' => '102.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '111.0.0.0',
				'browserversion' => '111.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '116.0',
				'browserversion' => '116.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '108.0.0.0',
				'browserversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '112.0.0.0',
				'browserversion' => '112.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '99.0.4844.51',
				'browserversion' => '99.0.4844.51',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '113.0.5666.197',
				'browserversion' => '113.0.5666.197',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '107.0.0.0',
				'browserversion' => '107.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaBrowser/23.5.2.625 Yowser/2.5 Safari/537.36' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Yandex',
				'browserversion' => '23.5.2.625',
				'engine' => 'Blink',
				'engineversion' => '112.0.0.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '113.0',
				'browserversion' => '113.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'platformversion' => '7',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '114.0',
				'browserversion' => '114.0',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.0.7) Gecko/20060917 K-Ninja/2.0.4' => [
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32,
				'kernel' => 'MS-DOS',
				'platform' => 'Windows',
				'platformversion' => '98',
				'engine' => 'Gecko',
				'engineversion' => '20060917',
				'browser' => 'K-Ninja',
				'browserversion' => '2.0.4',
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}

	public function testMac() {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'architecture' => 'x86',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Chrome',
				'browserversion' => '114.0.0.0',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '114.0',
				'browserversion' => '114.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '115.0',
				'browserversion' => '115.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.0.0',
				'engineversion' => '113.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Safari/605.1.15' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.2 Safari/605.1.15' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.4 Safari/605.1.15' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Safari/605.1.15' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'platformversion' => '10.15.7',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '112.0.0.0',
				'browserversion' => '112.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '115.0.0.0',
				'browserversion' => '115.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.2',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '79.0.3945.88',
				'browserversion' => '79.0.3945.88'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '108.0.0.0',
				'browserversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6.1 Safari/605.1.15' => [
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'processor' => 'Intel',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'platformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}

	public function testAndroid() {
		$strings = [
			'Mozilla/5.0 (Linux; Android 12; SM-S134DL) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '12',
				'device' => 'SM-S134DL',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'category' => 'mobile'
			],
			'Mozilla/5.0 (Linux; Android 12; NTH-NX9 Build/HONORNTH-N29; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/396.1.0.28.104;]' => [
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '12',
				'device' => 'NTH-NX9',
				'build' => 'HONORNTH-N29',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.5359.128',
				'engineversion' => '108.0.5359.128',
				'category' => 'mobile',
				'app' => 'Facebook',
				'appversion' => '396.1.0.28.104'
			],
			'Mozilla/5.0 (Linux; Android 11; motorola one 5G ace) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '11',
				'device' => 'motorola one 5G ace',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0',
				'category' => 'mobile'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.5359.130 Mobile Safari/537.36 (compatible; Google-AMPHTML)' => [
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'device' => 'Nexus 5X',
				'build' => 'MMB29P',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.5359.130',
				'engineversion' => '108.0.5359.130',
				'category' => 'mobile'
			],
			'Mozilla/5.0 (Linux; Android 10; ART-L29 Build/HUAWEIART-L29; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/88.0.4324.93 Mobile Safari/537.36 trill_2022707020 JsSdk/1.0 NetType/WIFI Channel/googleplay AppName/musical_ly app_version/27.7.2 ByteLocale/en ByteFullLocale/en Region/IQ BytedanceWebview/d8a21c6' => [
				'app' => 'musical_ly',
				'appversion' => '27.7.2',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'device' => 'ART-L29',
				'build' => 'HUAWEIART-L29',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '88.0.4324.93',
				'engineversion' => '88.0.4324.93',
				'category' => 'mobile'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}

	public function testChromeOs() {
		$strings = [
			'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Chrome OS',
				'platformversion' => '14541.0.0',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'browserversion' => '114.0.0.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; CrOS x86_64 15359.58.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.5615.134 Safari/537.36' => [
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '15359.58.0',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '112.0.5615.134',
				'engineversion' => '112.0.5615.134'
			],
			'Mozilla/5.0 (X11; CrOS armv7l 12371.89.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36' => [
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '12371.89.0',
				'architecture' => 'arm',
				'bits' => 32,
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '77.0.3865.120',
				'engineversion' => '77.0.3865.120'
			],
			'Mozilla/5.0 (X11; CrOS aarch64 15183.69.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'type' => 'human',
				'category' => 'desktop',
				'platform' => 'Chrome OS',
				'platformversion' => '15183.69.0',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'engineversion' => '108.0.0.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}

	public function testX11() {
		$strings = [
			'Mozilla/5.0 (X11; Linux X86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Chrome',
				'browserversion' => '114.0.0.0',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux X86_64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '114.0',
				'browserversion' => '114.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux X86_64; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '115.0',
				'browserversion' => '115.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:102.0) Gecko/20100101 Firefox/102.0' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '102.0',
				'browserversion' => '102.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '114.0',
				'browserversion' => '114.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '115.0',
				'browserversion' => '115.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '77.0.3865.75',
				'browserversion' => '77.0.3865.75',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.0.0',
				'engineversion' => '113.0.0.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '112.0.0.0',
				'browserversion' => '112.0.0.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/113.0' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'engineversion' => '113.0',
				'browserversion' => '113.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux X86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'engineversion' => '115.0.0.0',
				'browserversion' => '115.0.0.0',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; Linux x86_64; Quest 2) AppleWebKit/537.36 (KHTML, like Gecko) OculusBrowser/24.4.0.22.60.426469926 SamsungBrowser/4.0 Chrome/106.0.5249.181 VR Safari/537.36' => [
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'device' => 'Oculus Quest 2',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'OculusBrowser',
				'browserversion' => '24.4.0.22.60.426469926',
				'engine' => 'Blink',
				'engineversion' => '106.0.5249.181',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (X11; U; Linux x86_64; fr; rv:1.9.2.14pre) Gecko/20101224 Ubuntu/10.04 (lucid) Namoroka/3.6.14pre' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'platformversion' => '10.04',
				'engine' => 'Gecko',
				'engineversion' => '20101224',
				'architecture' => 'x86',
				'bits' => 64,
				'language' => 'fr'
			],
			'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0' => [
				'kernel' => 'Linux',
				'platform' => 'OpenBSD',
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '28.0',
				'engineversion' => '28.0',
				'architecture' => 'x86',
				'bits' => 64,
				'processor' => 'AMD'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.8) Gecko/20060911 SUSE/1.5.0.8-0.2 Firefox/52.7.3' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'SUSE',
				'platformversion' => '1.5.0.8-0.2',
				'engine' => 'Gecko',
				'engineversion' => '20060911',
				'browser' => 'Firefox',
				'browserversion' => '52.7.3',
				'architecture' => 'x86',
				'bits' => 32,
				'language' => 'en-US'
			],
			'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/534.16 SUSE/10.0.626.0 (KHTML, like Gecko) Chrome/10.0.626.0 Safari/534.16' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'SUSE',
				'platformversion' => '10.0.626.0',
				'engine' => 'WebKit',
				'engineversion' => '534.16',
				'browser' => 'Safari',
				'browserversion' => '534.16',
				'architecture' => 'x86',
				'bits' => '64',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.2) Gecko/2008091816 Red Hat/3.0.2-3.el5 Firefox/3.0.2' => [
				'kernel' => 'Linux',
				'platform' => 'Red Hat',
				'platformversion' => '3.0.2-3.el5',
				'type' => 'human',
				'category' => 'desktop',
				'engine' => 'Gecko',
				'engineversion' => '2008091816',
				'browser' => 'Firefox',
				'browserversion' => '3.0.2',
				'architecture' => 'x86',
				'bits' => 32,
				'language' => 'en-US'
			],
			'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.6) Gecko/20060808 Fedora/1.5.0.6-2.fc5 Firefox/52.4.1' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Linux',
				'platform' => 'Fedora',
				'platformversion' => '1.5.0.6-2.fc5',
				'engine' => 'Gecko',
				'engineversion' => '20060808',
				'browser' => 'Firefox',
				'browserversion' => '52.4.1',
				'architecture' => 'x86',
				'bits' => 32,
				'language' => 'en-US'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}

	public function testOther() {
		$strings = [
			'Mozilla/5.0 (Maemo; Linux armv7l; rv:10.0.1) Gecko/20100101 Firefox/10.0.1 Fennec/10.0.1' => [
				'type' => 'human',
				'category' => 'mobile',
				'kernel' => 'Linux',
				'platform' => 'Maemo',
				'architecture' => 'arm',
				'bits' => 32,
				'browser' => 'Fennec',
				'engine' => 'Gecko',
				'browserversion' => '10.0.1',
				'engineversion' => '10.0.1'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}
}