<?php
declare(strict_types = 1);
use hexydec\agentzero\agentzero;

final class crawlersTest extends \PHPUnit\Framework\TestCase {

	public function testSearch() : void {
		$strings = [
			'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
				'url' => 'http://www.google.com/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '2.1',
				'app' => 'GoogleBot',
				'appname' => 'Googlebot'
			],
			'SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)' => [
				'string' => 'SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)',
				'url' => 'http://www.google.com/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'browser' => 'UP.Browser',
				'browserversion' => '6.2.3.3.c.1.101',
				'appversion' => '2.1',
				'app' => 'GoogleBot',
				'appname' => 'Googlebot-Mobile',
				'model' => 'SGH-E250',
				'build' => '1.0',
				'vendor' => 'Samsung'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
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
				'app' => 'GoogleBot',
				'appname' => 'Googlebot',
				'appversion' => '2.1',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5X',
				'build' => 'MMB29P'
			],
			'Mozilla/5.0 (compatible; Bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (compatible; Bingbot/2.0; +http://www.bing.com/bingbot.htm)',
				'url' => 'http://www.bing.com/bingbot.htm',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '2.0',
				'app' => 'BingBot',
				'appname' => 'Bingbot'
			],
			'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)' => [
				'string' => 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)',
				'url' => 'http://help.yahoo.com/help/us/ysearch/slurp',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Yahoo! Slurp',
				'appname' => 'Yahoo! Slurp'
			],
			'DuckDuckBot/1.0; (+http://duckduckgo.com/duckduckbot.html)' => [
				'string' => 'DuckDuckBot/1.0; (+http://duckduckgo.com/duckduckbot.html)',
				'url' => 'http://duckduckgo.com/duckduckbot.html',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '1.0',
				'app' => 'DuckDuckBot',
				'appname' => 'DuckDuckBot'
			],
			'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)' => [
				'string' => 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)',
				'url' => 'http://www.baidu.com/search/spider.html',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '2.0',
				'app' => 'Baidu Spider',
				'appname' => 'Baiduspider'
			],
			'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)' => [
				'string' => 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)',
				'url' => 'http://yandex.com/bots',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '3.0',
				'app' => 'YandexBot',
				'appname' => 'YandexBot'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1)',
				'app' => 'AppleBot',
				'appname' => 'Applebot',
				'appversion' => '0.1',
				'type' => 'robot',
				'category' => 'search',
				'architecture' => 'x86',
				'bits' => 64,
				'processor' => 'Intel',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'platform' => 'Mac OS X',
				'platformversion' => '10.10.1',
				'browser' => 'Safari',
				'browserversion' => '8.0.2',
				'engine' => 'WebKit',
				'engineversion' => '600.2.5'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'AppleBot',
				'appname' => 'Applebot',
				'appversion' => '0.1',
				'url' => 'http://www.apple.com/go/applebot',
				'kernel' => 'Linux',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
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
			'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/2.0; +https://help.mail.ru/webmaster/indexing/robots)' => [
				'string' => 'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/2.0; +https://help.mail.ru/webmaster/indexing/robots)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Mail.ru Bot',
				'appname' => 'Mail.RU_Bot',
				'appversion' => '2.0',
				'url' => 'https://help.mail.ru/webmaster/indexing/robots',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1; 360Spider(compatible; HaosouSpider; http://www.haosoucom/help/help_3_2.html)' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1; 360Spider(compatible; HaosouSpider; http://www.haosoucom/help/help_3_2.html)',
				'type' => 'robot',
				'category' => 'search',
				'app' => '360Spider',
				'appname' => '360Spider',
				'url' => 'http://www.haosoucom/help/help_3_2.html',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'WebKit',
				'engineversion' => '537.1',
				'browser' => 'Chrome',
				'browserversion' => '21.0.1180.89'
			],
			'Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)' => [
				'string' => 'Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Sogou web spider',
				'appname' => 'Sogou web spider',
				'appversion' => '4.0',
				'url' => 'http://www.sogou.com/docs/help/webmasters.htm#07'
			],
			'Googlebot-Image/1.0' => [
				'string' => 'Googlebot-Image/1.0',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'GoogleBot',
				'appname' => 'Googlebot-Image',
				'appversion' => '1.0'
			],
			'Googlebot-Video/1.0' => [
				'string' => 'Googlebot-Video/1.0',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'GoogleBot',
				'appname' => 'Googlebot-Video',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012; Storebot-Google/1.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012; Storebot-Google/1.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'GoogleBot',
				'appname' => 'Storebot-Google',
				'appversion' => '1.0',
				'vendor' => 'Google',
				'device' => 'Pixel',
				'model' => '2',
				'build' => 'OPD3.170816.012',
				'platform' => 'Android',
				'platformversion' => '8.0',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '81.0.4044.138',
				'engineversion' => '81.0.4044.138'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'BingBot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '103.0.5060.134',
				'engineversion' => '103.0.5060.134'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'BingBot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5X',
				'build' => 'MMB29P',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'app' => 'BingBot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'category' => 'search',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '7.0',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '11A465',
				'engine' => 'WebKit',
				'engineversion' => '537.51.1',
				'browser' => 'Safari',
				'browserversion' => '7.0'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; adidxbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; adidxbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'AdidxBot',
				'appname' => 'adidxbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '7.0',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '11A465',
				'engine' => 'WebKit',
				'engineversion' => '537.51.1',
				'browser' => 'Safari',
				'browserversion' => '7.0'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/80.0.345.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/80.0.345.0 Safari/537.36',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'BingBot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'BingBot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5X',
				'build' => 'MMB29P',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0'
			],
			'Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; https://zhanzhang.toutiao.com/)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; https://zhanzhang.toutiao.com/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Bytespider',
				'appname' => 'Bytespider',
				'url' => 'https://zhanzhang.toutiao.com/',
				'platform' => 'Android',
				'platformversion' => '5.0',
				'kernel' => 'Linux'
			],
			'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'PetalBot',
				'appname' => 'PetalBot',
				'url' => 'https://webmaster.petalsearch.com/site/petalbot',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'kernel' => 'Linux'
			],
			'Mozilla/5.0 (compatible; Qwantify/2.4w; +https://www.qwant.com/)' => [
				'string' => 'Mozilla/5.0 (compatible; Qwantify/2.4w; +https://www.qwant.com/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Qwant Web Crawler',
				'appname' => 'Qwantify',
				'appversion' => '2.4w',
				'url' => 'https://www.qwant.com/'
			],
			'Mozilla/5.0 (compatible; Qwantify-junior/1.0; +https://www.qwant.com/)' => [
				'string' => 'Mozilla/5.0 (compatible; Qwantify-junior/1.0; +https://www.qwant.com/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Qwant Web Crawler',
				'appname' => 'Qwantify-junior',
				'appversion' => '1.0',
				'url' => 'https://www.qwant.com/'
			],
			'Mozilla/5.0 (compatible; Qwantify-news/2.0; +https://www.qwant.com/)' => [
				'string' => 'Mozilla/5.0 (compatible; Qwantify-news/2.0; +https://www.qwant.com/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Qwant Web Crawler',
				'appname' => 'Qwantify-news',
				'appversion' => '2.0',
				'url' => 'https://www.qwant.com/'
			],
			'Mozilla/5.0 (compatible; Qwantify-dev/1.0; +https://help.qwant.com/bot/)' => [
				'string' => 'Mozilla/5.0 (compatible; Qwantify-dev/1.0; +https://help.qwant.com/bot/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Qwant Web Crawler',
				'appname' => 'Qwantify-dev',
				'appversion' => '1.0',
				'url' => 'https://help.qwant.com/bot/'
			],
			'Mozilla/5.0 (compatible; Qwantify-dev217/1.0; +https://help.qwant.com/bot/)' => [
				'string' => 'Mozilla/5.0 (compatible; Qwantify-dev217/1.0; +https://help.qwant.com/bot/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Qwant Web Crawler',
				'appname' => 'Qwantify-dev217',
				'appversion' => '1.0',
				'url' => 'https://help.qwant.com/bot/'
			],
			'Mozilla/5.0 (compatible; Qwantify-prod77/1.0; +https://help.qwant.com/bot/)' => [
				'string' => 'Mozilla/5.0 (compatible; Qwantify-prod77/1.0; +https://help.qwant.com/bot/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Qwant Web Crawler',
				'appname' => 'Qwantify-prod77',
				'appversion' => '1.0',
				'url' => 'https://help.qwant.com/bot/'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testFeed() : void {
		$strings = [
			'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)' => [
				'string' => 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
				'url' => 'http://www.facebook.com/externalhit_uatext.php',
				'type' => 'robot',
				'category' => 'feed',
				'appversion' => '1.1',
				'app' => 'Facebook URL Preview',
				'appname' => 'facebookexternalhit'
			],
			'FeedFetcher-Google; (+http://www.google.com/feedfetcher.html)' => [
				'string' => 'FeedFetcher-Google; (+http://www.google.com/feedfetcher.html)',
				'url' => 'http://www.google.com/feedfetcher.html',
				'type' => 'robot',
				'app' => 'FeedFetcher-Google',
				'appname' => 'FeedFetcher-Google',
				'category' => 'feed'
			],
			'GoogleProducer; (+http://goo.gl/7y4SX)' => [
				'string' => 'GoogleProducer; (+http://goo.gl/7y4SX)',
				'url' => 'http://goo.gl/7y4SX',
				'type' => 'robot',
				'app' => 'GoogleProducer',
				'appname' => 'GoogleProducer',
				'category' => 'feed'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview) Chrome/80.0.345.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview) Chrome/80.0.345.0 Safari/537.36',
				'url' => 'https://aka.ms/MicrosoftPreview',
				'type' => 'robot',
				'category' => 'feed',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0',
				'app' => 'MicrosoftPreview',
				'appname' => 'MicrosoftPreview',
				'appversion' => '2.0'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview)',
				'url' => 'https://aka.ms/MicrosoftPreview',
				'type' => 'robot',
				'category' => 'feed',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5X',
				'build' => 'MMB29P',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0',
				'app' => 'MicrosoftPreview',
				'appname' => 'MicrosoftPreview',
				'appversion' => '2.0'
			],
			'YoFMWhatsApp/2.23.1.76 A' => [
				'string' => 'YoFMWhatsApp/2.23.1.76 A',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'WhatsApp',
				'appname' => 'YoFMWhatsApp',
				'appversion' => '2.23.1.76'
			],
			'PycURL/7.45.2 libcurl/7.64.0 OpenSSL/1.1.1n zlib/1.2.11 libidn2/2.0.5 libpsl/0.20.2 (+libidn2/2.0.5) libssh2/1.8.0 nghttp2/1.36.0 librtmp/2.3' => [
				'string' => 'PycURL/7.45.2 libcurl/7.64.0 OpenSSL/1.1.1n zlib/1.2.11 libidn2/2.0.5 libpsl/0.20.2 (+libidn2/2.0.5) libssh2/1.8.0 nghttp2/1.36.0 librtmp/2.3',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'PycURL',
				'appname' => 'PycURL',
				'appversion' => '7.45.2'
			],
			'Outlook-Android/2.0' => [
				'string' => 'Outlook-Android/2.0',
				'type' => 'robot',
				'category' => 'feed',
				'platform' => 'Android',
				'app' => 'Outlook',
				'appname' => 'Outlook-Android',
				'appversion' => '2.0'
			],
			'Outlook-iOS/2.0' => [
				'string' => 'Outlook-iOS/2.0',
				'type' => 'robot',
				'category' => 'feed',
				'platform' => 'iOS',
				'app' => 'Outlook',
				'appname' => 'Outlook-iOS',
				'appversion' => '2.0'
			],
			'OutlookMobileCloudService-Autodetect/1.0.0' => [
				'string' => 'OutlookMobileCloudService-Autodetect/1.0.0',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Outlook',
				'appname' => 'OutlookMobileCloudService-Autodetect',
				'appversion' => '1.0.0'
			],
			'Outlook-iOS/711.2714636.prod.iphone (3.36.1)' => [
				'string' => 'Outlook-iOS/711.2714636.prod.iphone (3.36.1)',
				'type' => 'robot',
				'category' => 'feed',
				'platform' => 'iOS',
				'app' => 'Outlook',
				'appname' => 'Outlook-iOS',
				'appversion' => '3.36.1'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testAds() : void {
		$strings = [
			'Mozilla/5.0 (compatible; proximic; +https://www.comscore.com/Web-Crawler)' => [
				'string' => 'Mozilla/5.0 (compatible; proximic; +https://www.comscore.com/Web-Crawler)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'proximic',
				'appname' => 'proximic',
				'url' => 'https://www.comscore.com/Web-Crawler'
			],
			'AdsBot-Google (+http://www.google.com/adsbot.html)' => [
				'string' => 'AdsBot-Google (+http://www.google.com/adsbot.html)',
				'url' => 'http://www.google.com/adsbot.html',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'GoogleBot',
				'appname' => 'AdsBot-Google'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'GoogleBot',
				'appname' => 'AdsBot-Google-Mobile',
				'url' => 'http://www.google.com/mobile/adsbot.html',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5X',
				'build' => 'MMB29P',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '81.0.4044.138',
				'engineversion' => '81.0.4044.138'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'GoogleBot',
				'appname' => 'AdsBot-Google-Mobile',
				'url' => 'http://www.google.com/mobile/adsbot.html',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '14.7.1',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '14.1.2'
			],
			'Mozilla/5.0 (Linux; Android 5.0.2; SAMSUNG SM-T550 Build/LRX22G) adbeat.com/policy AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/3.3 Chrome/38.0.2125.102 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 5.0.2; SAMSUNG SM-T550 Build/LRX22G) adbeat.com/policy AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/3.3 Chrome/38.0.2125.102 Safari/537.36',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Adbeat',
				'appname' => 'Adbeat',
				'url' => 'https://adbeat.com/policy',
				'vendor' => 'Samsung',
				'model' => 'SM-T550',
				'build' => 'LRX22G',
				'platform' => 'Android',
				'platformversion' => '5.0.2',
				'kernel' => 'Linux',
				'browser' => 'Samsung Browser',
				'browserversion' => '3.3',
				'engine' => 'Blink',
				'engineversion' => '38.0.2125.102'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testValidators() : void {
		$strings = [
			'Mozilla/5.0 (compatible; Google-Site-Verification/1.0)' => [
				'string' => 'Mozilla/5.0 (compatible; Google-Site-Verification/1.0)',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Google Site Verification',
				'appname' => 'Google-Site-Verification',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (pc-x86_64-linux-gnu) Siege/4.1.6' => [
				'string' => 'Mozilla/5.0 (pc-x86_64-linux-gnu) Siege/4.1.6',
				'type' => 'robot',
				'category' => 'validator',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'app' => 'Siege',
				'appname' => 'Siege',
				'appversion' => '4.1.6'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testCrawlers() : void {
		$strings = [
			'Mozilla/5.0 (compatible; SemrushBot/7~bl-slave; http://www.semrush.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; SemrushBot/7~bl-slave; http://www.semrush.com/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'SemrushBot',
				'appname' => 'SemrushBot',
				'appversion' => '7',
				'url' => 'http://www.semrush.com/bot.html'
			],
			'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)' => [
				'string' => 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'AhrefsBot',
				'appname' => 'AhrefsBot',
				'appversion' => '7.0',
				'url' => 'http://ahrefs.com/robot/'
			],
			'MJ12bot/v1.1.2 (http://majestic12.co.uk/bot.php?+)' => [
				'string' => 'MJ12bot/v1.1.2 (http://majestic12.co.uk/bot.php?+)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Majestic 12 Bot',
				'appname' => 'MJ12bot',
				'appversion' => '1.1.2',
				'url' => 'http://majestic12.co.uk/bot.php'
			],
			'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)' => [
				'string' => 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Majestic 12 Bot',
				'appname' => 'MJ12bot',
				'appversion' => '1.4.8',
				'url' => 'http://mj12bot.com/'
			],
			'Mozilla/5.0 (compatible; MJ12bot/v1.4.8 (domain ownership verifier); http://mj12bot.com)' => [
				'string' => 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8 (domain ownership verifier); http://mj12bot.com)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Majestic 12 Bot',
				'appname' => 'MJ12bot',
				'appversion' => '1.4.8',
				'url' => 'http://mj12bot.com'
			],
			'CCBot/2.0 (https://commoncrawl.org/faq/)' => [
				'string' => 'CCBot/2.0 (https://commoncrawl.org/faq/)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'CCBot',
				'appname' => 'CCBot',
				'appversion' => '2.0',
				'url' => 'https://commoncrawl.org/faq/'
			],
			'Mozilla/5.0 (compatible; Swiftbot/1.0; UID/54e1c2ebd3b687d3c8000018; +http://swiftype.com/swiftbot)' => [
				'string' => 'Mozilla/5.0 (compatible; Swiftbot/1.0; UID/54e1c2ebd3b687d3c8000018; +http://swiftype.com/swiftbot)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Swiftbot',
				'appname' => 'Swiftbot',
				'appversion' => '1.0',
				'url' => 'http://swiftype.com/swiftbot'
			],
			'magpie-crawler/1.1 (robots-txt-validator; +http://www.brandwatch.net)' => [
				'string' => 'magpie-crawler/1.1 (robots-txt-validator; +http://www.brandwatch.net)',
				'type' => 'robot',
				'app' => 'magpie-crawler',
				'appname' => 'magpie-crawler',
				'category' => 'crawler',
				'appversion' => '1.1',
				'url' => 'http://www.brandwatch.net'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.10) Gecko/20050716 Thunderbird/1.0.6 - WebCrawler http://cognitiveseo.com/bot.html' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.10) Gecko/20050716 Thunderbird/1.0.6 - WebCrawler http://cognitiveseo.com/bot.html',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'WebCrawler',
				'appname' => 'WebCrawler',
				'url' => 'http://cognitiveseo.com/bot.html',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '2000',
				'engine' => 'Gecko',
				'engineversion' => '20050716',
				'browser' => 'Thunderbird',
				'browserversion' => '1.0.6',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (compatible; OnCrawl/1.0; +http://www.oncrawl.com/)' => [
				'string' => 'Mozilla/5.0 (compatible; OnCrawl/1.0; +http://www.oncrawl.com/)',
				'url' => 'http://www.oncrawl.com/',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'OnCrawl',
				'appname' => 'OnCrawl',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Probe by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Probe by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Probe by Siteimprove.com',
				'appname' => 'Probe by Siteimprove.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, Google Page Speed Insights) Chrome/114.0.0.0 Safari/537.36 OPR/100.0.0.0 Chrome-Lighthouse' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, Google Page Speed Insights) Chrome/114.0.0.0 Safari/537.36 OPR/100.0.0.0 Chrome-Lighthouse',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Google Page Speed Insights',
				'appname' => 'Google Page Speed Insights',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Opera',
				'browserversion' => '100.0.0.0',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0'
			],
			'Screaming Frog SEO Spider/19.0 Beta 1' => [
				'string' => 'Screaming Frog SEO Spider/19.0 Beta 1',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Screaming Frog SEO Spider',
				'appname' => 'Screaming Frog SEO Spider',
				'appversion' => '19.0'
			],
			'rogerbot/1.2 (https://moz.com/help/guides/moz-procedures/what-is-rogerbot, rogerbot-crawler aardwolf-production-crawler-53@moz.com)' => [
				'string' => 'rogerbot/1.2 (https://moz.com/help/guides/moz-procedures/what-is-rogerbot, rogerbot-crawler aardwolf-production-crawler-53@moz.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'rogerbot',
				'appname' => 'rogerbot',
				'appversion' => '1.2',
				'url' => 'https://moz.com/help/guides/moz-procedures/what-is-rogerbot'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) LinkCheck by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) LinkCheck by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'LinkCheck by Siteimprove.com',
				'appname' => 'LinkCheck by Siteimprove.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0'
			],
			'Mozilla/5.0 (compatible; Pro Sitemaps Generator; pro-sitemaps.com) Gecko Pro-Sitemaps/1.0' => [
				'string' => 'Mozilla/5.0 (compatible; Pro Sitemaps Generator; pro-sitemaps.com) Gecko Pro-Sitemaps/1.0',
				'type' => 'robot',
				'category' => 'crawler',
				'engine' => 'Gecko',
				'app' => 'Pro-Sitemaps',
				'appname' => 'Pro-Sitemaps',
				'appversion' => '1.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testScrapers() : void {
		$strings = [
			'CyotekWebCopy/1.9 CyotekHTTP/6.4' => [
				'string' => 'CyotekWebCopy/1.9 CyotekHTTP/6.4',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'CyotekWebCopy',
				'appname' => 'CyotekWebCopy',
				'appversion' => '1.9'
			],
			'Mozilla/5.0 (Linux; Linux 4.18.0-305.3.1.el8.x86_64 #1 SMP Tue Jun 1 16:14:33 UTC 2021; en-US) PowerShell/7.3.1' => [
				'string' => 'Mozilla/5.0 (Linux; Linux 4.18.0-305.3.1.el8.x86_64 #1 SMP Tue Jun 1 16:14:33 UTC 2021; en-US) PowerShell/7.3.1',
				'type' => 'robot',
				'category' => 'scraper',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'platformversion' => '4.18.0-305.3.1.el8.x86_64',
				'language' => 'en-US',
				'app' => 'PowerShell',
				'appname' => 'PowerShell',
				'appversion' => '7.3.1'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testMonitors() : void {
		$strings = [
			'Mozilla/5.0+(compatible; UptimeRobot/2.0; http://www.uptimerobot.com/)' => [
				'string' => 'Mozilla/5.0+(compatible; UptimeRobot/2.0; http://www.uptimerobot.com/)',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'UptimeRobot',
				'appname' => 'UptimeRobot',
				'appversion' => '2.0',
				'url' => 'http://www.uptimerobot.com/'
			],
			'Pingdom.com_bot_version_1.4_(http://www.pingdom.com/)' => [
				'string' => 'Pingdom.com_bot_version_1.4_(http://www.pingdom.com/)',
				'type' => 'robot',
				'app' => 'Pingdom.com',
				'appname' => 'Pingdom.com_bot_version_1.4',
				'category' => 'monitor',
				'appversion' => '1.4',
				'url' => 'http://www.pingdom.com/'
			],
			'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) browser/22.1.0 Chrome/108.0.5359.179 Electron/22.1.0 Safari/537.36 PingdomTMS/22.1' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) browser/22.1.0 Chrome/108.0.5359.179 Electron/22.1.0 Safari/537.36 PingdomTMS/22.1',
				'type' => 'robot',
				'app' => 'Pingdom.com',
				'appname' => 'PingdomTMS',
				'appversion' => '22.1',
				'framework' => 'Electron',
				'frameworkversion' => '22.1.0',
				'category' => 'monitor',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8.1',
				'architecture' => 'x86',
				'bits' => 64,
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.5359.179',
				'engineversion' => '108.0.5359.179'
			],
			'WordPress/6.1.1; https://www.getsafeonline.org' => [
				'string' => 'WordPress/6.1.1; https://www.getsafeonline.org',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'WordPress',
				'appname' => 'WordPress',
				'appversion' => '6.1.1',
				'url' => 'https://www.getsafeonline.org'
			],
			'Mozilla/5.0 (compatible; PRTG Network Monitor (www.paessler.com); Windows)' => [
				'string' => 'Mozilla/5.0 (compatible; PRTG Network Monitor (www.paessler.com); Windows)',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'PRTG Network Monitor',
				'appname' => 'PRTG Network Monitor',
				'url' => 'www.paessler.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows'
			],
			'Mozilla/5.0 (compatible; PRTGCloudBot/1.0; +https://www.paessler.com/prtgcloudbot; for_[licensehash])' => [
				'string' => 'Mozilla/5.0 (compatible; PRTGCloudBot/1.0; +https://www.paessler.com/prtgcloudbot; for_[licensehash])',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'PRTGCloudBot',
				'appname' => 'PRTGCloudBot',
				'appversion' => '1.0',
				'url' => 'https://www.paessler.com/prtgcloudbot'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1 Site24x7' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1 Site24x7',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Site24x7',
				'appname' => 'Site24x7',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '13.2.3',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '13.0.3'
			],
			'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk' => [
				'string' => 'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'NCSC Web Check',
				'appname' => 'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk'
			],
			'Mozilla/5.0 (compatible; CloudFlare-AlwaysOnline/1.0; +http://www.cloudflare.com/always-online)' => [
				'string' => 'Mozilla/5.0 (compatible; CloudFlare-AlwaysOnline/1.0; +http://www.cloudflare.com/always-online)',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Cloudflare Always Online',
				'appname' => 'CloudFlare-AlwaysOnline',
				'appversion' => '1.0',
				'url' => 'http://www.cloudflare.com/always-online'
			],
			'Mozilla/5.0 (compatible; Cloudflare-Healthchecks/1.0; +https://www.cloudflare.com/; healthcheck-id: lksa8d89ashdhja864ad)' => [
				'string' => 'Mozilla/5.0 (compatible; Cloudflare-Healthchecks/1.0; +https://www.cloudflare.com/; healthcheck-id: lksa8d89ashdhja864ad)',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Cloudflare Health Checks',
				'appname' => 'Cloudflare-Healthchecks',
				'appversion' => '1.0',
				'url' => 'https://www.cloudflare.com/'
			],
			'Mozilla/5.0 (compatible; Cloudflare-Traffic-Manager/1.0; +https://www.cloudflare.com/traffic-manager/; pool-id: 12345)' => [
				'string' => 'Mozilla/5.0 (compatible; Cloudflare-Traffic-Manager/1.0; +https://www.cloudflare.com/traffic-manager/; pool-id: 12345)',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Cloudflare-Traffic-Manager',
				'appname' => 'Cloudflare-Traffic-Manager',
				'appversion' => '1.0',
				'url' => 'https://www.cloudflare.com/traffic-manager/'
			],
			'Mozilla/5.0 (compatible; CloudFlare-Prefetch/0.1; +http://www.cloudflare.com/)' => [
				'string' => 'Mozilla/5.0 (compatible; CloudFlare-Prefetch/0.1; +http://www.cloudflare.com/)',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Cloudflare Prefetch',
				'appname' => 'CloudFlare-Prefetch',
				'appversion' => '0.1',
				'url' => 'http://www.cloudflare.com/'
			],
			'Cloudflare-SSLDetector' => [
				'string' => 'Cloudflare-SSLDetector',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Cloudflare SSL Detector',
				'appname' => 'Cloudflare-SSLDetector'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36 PTST/190628.140653' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36 PTST/190628.140653',
				'type' => 'robot',
				'category' => 'validator',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'Blink',
				'engineversion' => '75.0.3770.100',
				'browser' => 'Chrome',
				'browserversion' => '75.0.3770.100',
				'app' => 'Cloudflare Speed Test',
				'appname' => 'PTST',
				'appversion' => '190628.140653'
			],
			'Cloudflare-diagnostics' => [
				'string' => 'Cloudflare-diagnostics',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Cloudflare Diagnostics',
				'appname' => 'Cloudflare-diagnostics'
			],
			'Cloudflare Custom Hostname Verification' => [
				'string' => 'Cloudflare Custom Hostname Verification',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Cloudflare Custom Hostname Verification',
				'appname' => 'Cloudflare Custom Hostname Verification'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}