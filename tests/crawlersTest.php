<?php
use hexydec\agentzero\agentzero;

final class crawlersTest extends \PHPUnit\Framework\TestCase {

	public function testSearch() {
		$strings = [
			'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' => [
				'url' => 'http://www.google.com/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '2.1',
				'app' => 'Googlebot'
			],
			'AdsBot-Google (+http://www.google.com/adsbot.html)' => [
				'url' => 'http://www.google.com/adsbot.html',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'AdsBot-Google'
			],
			'SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)' => [
				'url' => 'http://www.google.com/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'browser' => 'UP.Browser',
				'browserversion' => '6.2.3.3.c.1.101',
				'appversion' => '2.1',
				'app' => 'Googlebot-Mobile'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' => [
				'url' => 'http://www.google.com/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'browser' => 'Chrome',
				'browserversion' => '41.0.2272.96',
				'engine' => 'Blink',
				'engineversion' => '41.0.2272.96',
				'app' => 'Googlebot',
				'appversion' => '2.1',
				'device' => 'Nexus 5X',
				'build' => 'MMB29P'
			],
			'Mozilla/5.0 (compatible; Bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'url' => 'http://www.bing.com/bingbot.htm',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '2.0',
				'app' => 'Bingbot'
			],
			'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)' => [
				'url' => 'http://help.yahoo.com/help/us/ysearch/slurp',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Yahoo! Slurp'
			],
			'DuckDuckBot/1.0; (+http://duckduckgo.com/duckduckbot.html)' => [
				'url' => 'http://duckduckgo.com/duckduckbot.html',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '1.0',
				'app' => 'DuckDuckBot'
			],
			'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)' => [
				'url' => 'http://www.baidu.com/search/spider.html',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '2.0',
				'app' => 'Baiduspider'
			],
			'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)' => [
				'url' => 'http://yandex.com/bots',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '3.0',
				'app' => 'YandexBot'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1)' => [
				'app' => 'Applebot',
				'appversion' => '0.1',
				'type' => 'robot',
				'category' => 'search',
				'architecture' => 'x86',
				'bits' => 64,
				'processor' => 'Intel',
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'platformversion' => '10.10.1',
				'browser' => 'Safari',
				'browserversion' => '600.2.5',
				'engine' => 'WebKit',
				'engineversion' => '600.2.5'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Applebot',
				'appversion' => '0.1',
				'url' => 'http://www.apple.com/go/applebot',
				'kernel' => 'Linux',
				'platform' => 'MacOS',
				'platformversion' => '10.15.5',
				'bits' => 64,
				'processor' => 'Intel',
				'architecture' => 'x86',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '605.1.15'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}

	public function testFeed() {
		$strings = [
			'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)' => [
				'url' => 'http://www.facebook.com/externalhit_uatext.php',
				'type' => 'robot',
				'category' => 'feed',
				'appversion' => '1.1',
				'app' => 'facebookexternalhit'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}

	public function testMail() {
		$strings = [
			'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/2.0; +https://help.mail.ru/webmaster/indexing/robots)' => [
				'type' => 'robot',
				'category' => 'mail',
				'app' => 'Mail.RU_Bot',
				'appversion' => '2.0',
				'url' => 'https://help.mail.ru/webmaster/indexing/robots',
				'kernel' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}
}