<?php
use hexydec\agentzero\agentzero;

final class jsliteTest extends \PHPUnit\Framework\TestCase {

	public function testUserAgents() {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.0.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '114.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '115.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.0.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '114.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '115.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'plaformversion' => '10.15',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '114.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.67',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:102.0) Gecko/20100101 Firefox/102.0' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '102.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; rv:114.0) Gecko/20100101 Firefox/114.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '114.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'plaformversion' => '10.15',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '115.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '109.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.58' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.58',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 OPR/99.0.0.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Opera',
				'browserversion' => '99.0.0.0',
				'engine' => 'Blink',
				'engineversion' => '113.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.82',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '115.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '115.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.0.0'
			],
			'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '114.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Safari/605.1.15' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '115.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Firefox/102.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '102.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.51' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.51',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Edge',
				'browserversion' => '114.0.1823.79',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '77.0.3865.75',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.2 Safari/605.1.15' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Windows NT 10.0; rv:102.0) Gecko/20100101 Firefox/102.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '102.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '111.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '114.0.0.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.4 Safari/605.1.15' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Safari/605.1.15' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '116.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.0.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '112.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '115.0.0.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '112.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '99.0.4844.51',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.2',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '79.0.3945.88'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '112.0.0.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '110.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/113.0' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '113.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.0.0'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6.1 Safari/605.1.15' => [
				'platform' => 'Linux',
				'os' => 'MacOS',
				'type' => 'Desktop',
				'register' => '64 bit',
				'plaformversion' => '10.15.7',
				'browser' => 'Safari',
				'browserversion' => '605.1.15',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.5666.197 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '113.0.5666.197',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '107.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaBrowser/23.5.2.625 Yowser/2.5 Safari/537.36' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Yandex Browser',
				'browserversion' => '23.5.2.625',
				'engine' => 'Blink',
				'engineversion' => '112.0.0.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '10',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '113.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0' => [
				'platform' => 'Windows NT',
				'os' => 'Windows',
				'type' => 'Desktop',
				'architecture' => 'x86',
				'osversion' => '7',
				'browser' => 'Firefox',
				'engine' => 'Gecko',
				'browserversion' => '114.0',
				'register' => '64 Bit'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36' => [
				'platform' => 'Linux',
				'os' => 'X11',
				'type' => 'Desktop',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '115.0.0.0',
				'architecture' => 'x86',
				'register' => '64 Bit'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals((array) agentzero::detect($ua), $item);
		}
	}

	public function testCrawlers() {
		$strings = [
			'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' => [
				'url' => '+http://www.google.com/bot.html',
				'type' => 'Crawler',
				'appversion' => '2.1',
				'app' => 'Googlebot'
			],
			'SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)' => [
				'url' => '+http://www.google.com/bot.html',
				'type' => 'Crawler',
				'browser' => 'UP.Browser',
				'browserversion' => '6.2.3.3.c.1.101',
				'appversion' => '2.1',
				'app' => 'Googlebot-Mobile'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' => [
				'url' => '+http://www.google.com/bot.html',
				'type' => 'Crawler',
				'plaformversion' => '6.0.1',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '41.0.2272.96',
				'appversion' => '2.1',
				'app' => 'Googlebot',
				'device' => 'Nexus 5X',
				'build' => 'MMB29P'
			],
			'Mozilla/5.0 (compatible; Bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'url' => '+http://www.bing.com/bingbot.htm',
				'type' => 'Crawler',
				'appversion' => '2.0',
				'app' => 'Bingbot'
			],
			'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)' => [
				'url' => 'http://help.yahoo.com/help/us/ysearch/slurp',
				'type' => 'Crawler',
				'app' => 'Yahoo! Slurp'
			],
			'DuckDuckBot/1.0; (+http://duckduckgo.com/duckduckbot.html)' => [
				'url' => '+http://duckduckgo.com/duckduckbot.html',
				'type' => 'Crawler',
				'appversion' => '1.0',
				'app' => 'DuckDuckBot'
			],
			'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)' => [
				'url' => '+http://www.baidu.com/search/spider.html',
				'type' => 'Crawler',
				'appversion' => '2.0',
				'app' => 'Baiduspider'
			],
			'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)' => [
				'url' => '+http://yandex.com/bots',
				'type' => 'Crawler',
				'appversion' => '3.0',
				'app' => 'YandexBot'
			],
			'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)' => [
				'url' => '+http://www.facebook.com/externalhit_uatext.php',
				'type' => 'Crawler',
				'appversion' => '1.1',
				'app' => 'facebookexternalhit'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1)' => [
				'appversion' => '0.1',
				'app' => 'Applebot',
				'type' => 'Crawler',
				'platform' => 'Linux',
				'os' => 'MacOS',
				'plaformversion' => '10.10.1',
				'browser' => 'Safari',
				'browserversion' => '600.2.5',
				'engine' => 'WebKit',
				'engineversion' => '600.2.5'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals((array) agentzero::detect($ua), $item);
		}
	}
}