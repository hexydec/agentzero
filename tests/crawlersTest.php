<?php
declare(strict_types = 1);

final class crawlersTest extends \PHPUnit\Framework\TestCase {

	public function testSearch() : void {
		$strings = [
			'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
				'url' => 'http://www.google.com/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '2.1',
				'app' => 'Google Bot',
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
				'app' => 'Google Bot',
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
				'app' => 'Google Bot',
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
				'app' => 'Bing Bot',
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
				'app' => 'DuckDuck Bot',
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
			'Mozilla/5.0 (compatible; Baiduspider-render/2.0; Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.1 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (compatible; Baiduspider-render/2.0; Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.1 Safari/537.36',
				'type' => 'robot',
				'category' => 'crawler',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '79.0.1',
				'browser' => 'Chrome',
				'browserversion' => '79.0.1',
				'app' => 'Baidu Spider',
				'appname' => 'Baiduspider-render',
				'appversion' => '2.0',
				'browserreleased' => '2020-01-16'
			],
			'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:17.0; Baiduspider-ads) Gecko/17.0 Firefox/17.0' => [
				'string' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:17.0; Baiduspider-ads) Gecko/17.0 Firefox/17.0',
				'type' => 'robot',
				'category' => 'ads',
				'architecture' => 'x86',
				'bits' => '64',
				'kernel' => 'Linux',
				'platform' => 'Ubuntu',
				'engine' => 'Gecko',
				'engineversion' => '17.0',
				'browser' => 'Firefox',
				'browserversion' => '17.0',
				'app' => 'Baidu Spider',
				'appname' => 'Baiduspider-ads',
				'browserreleased' => '2012-11-20'
			],
			'Baiduspider-image+(+http://www.baidu.com/search/spider.htm)' => [
				'string' => 'Baiduspider-image+(+http://www.baidu.com/search/spider.htm)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Baidu Spider',
				'appname' => 'Baiduspider-image+',
				'url' => 'http://www.baidu.com/search/spider.htm'
			],
			'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)' => [
				'string' => 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)',
				'url' => 'http://yandex.com/bots',
				'type' => 'robot',
				'category' => 'search',
				'appversion' => '3.0',
				'app' => 'Yandex Bot',
				'appname' => 'YandexBot'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1)',
				'app' => 'Apple Bot',
				'appname' => 'Applebot',
				'appversion' => '0.1',
				'type' => 'robot',
				'category' => 'ai',
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
				'engineversion' => '600.2.5',
				'browserreleased' => '2014-06-06'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Apple Bot',
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
				'browserversion' => '13.1.1',
				'browserreleased' => '2020-03-24'
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
				'app' => '360 Spider',
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
				'app' => 'Sogou Web Spider',
				'appname' => 'Sogou web spider',
				'appversion' => '4.0',
				'url' => 'http://www.sogou.com/docs/help/webmasters.htm#07'
			],
			'Googlebot-Image/1.0' => [
				'string' => 'Googlebot-Image/1.0',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Google Bot',
				'appname' => 'Googlebot-Image',
				'appversion' => '1.0'
			],
			'Googlebot-Video/1.0' => [
				'string' => 'Googlebot-Video/1.0',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Google Bot',
				'appname' => 'Googlebot-Video',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012; Storebot-Google/1.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012; Storebot-Google/1.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Google Bot',
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
				'engineversion' => '81.0.4044.138',
				'browserreleased' => '2020-05-05'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Bing Bot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '103.0.5060.134',
				'engineversion' => '103.0.5060.134',
				'browserreleased' => '2022-07-19'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Bing Bot',
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
				'engineversion' => '80.0.345.0',
				'browserreleased' => '2020-04-02'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'app' => 'Bing Bot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'category' => 'search',
				'architecture' => 'Arm',
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
				'browserversion' => '7.0',
				'browserreleased' => '2013-10-22'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; adidxbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; adidxbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Adidx Bot',
				'appname' => 'adidxbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'architecture' => 'Arm',
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
				'browserversion' => '7.0',
				'browserreleased' => '2013-10-22'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/80.0.345.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/80.0.345.0 Safari/537.36',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Bing Bot',
				'appname' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0',
				'browserreleased' => '2020-04-02'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Bing Bot',
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
				'engineversion' => '80.0.345.0',
				'browserreleased' => '2020-04-02'
			],
			'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Petal Bot',
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
			],
			'Mozilla/5.0 (compatible; YandexImages/3.0; +http://yandex.com/bots)' => [
				'string' => 'Mozilla/5.0 (compatible; YandexImages/3.0; +http://yandex.com/bots)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Yandex Bot',
				'appname' => 'YandexImages',
				'appversion' => '3.0',
				'url' => 'http://yandex.com/bots'
			],
			'Mozilla/5.0 (compatible; YandexRenderResourcesBot/1.0; +http://yandex.com/bots) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0' => [
				'string' => 'Mozilla/5.0 (compatible; YandexRenderResourcesBot/1.0; +http://yandex.com/bots) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0',
				'type' => 'robot',
				'category' => 'search',
				'engine' => 'Blink',
				'engineversion' => '108.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '108.0.0.0',
				'app' => 'Yandex Bot',
				'appname' => 'YandexRenderResourcesBot',
				'appversion' => '1.0',
				'url' => 'http://yandex.com/bots',
				'browserreleased' => '2023-01-10'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'OpenAI SearchBot',
				'appname' => 'OAI-SearchBot',
				'appversion' => '1.0',
				'url' => 'https://openai.com/searchbot'
			],
			'iaskspider/2.0(+http://iask.com/help/help_index.html)' => [
				'string' => 'iaskspider/2.0(+http://iask.com/help/help_index.html)',
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Iask Spider',
				'appname' => 'iaskspider',
				'appversion' => '2.0',
				'url' => 'http://iask.com/help/help_index.html'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
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
				'app' => 'Feed Fetcher Google',
				'appname' => 'FeedFetcher-Google',
				'category' => 'feed'
			],
			'GoogleProducer; (+http://goo.gl/7y4SX)' => [
				'string' => 'GoogleProducer; (+http://goo.gl/7y4SX)',
				'url' => 'http://goo.gl/7y4SX',
				'type' => 'robot',
				'app' => 'Google Producer',
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
				'app' => 'Microsoft Preview',
				'appname' => 'MicrosoftPreview',
				'appversion' => '2.0',
				'browserreleased' => '2020-04-02'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36 (compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview)',
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
				'app' => 'Microsoft Preview',
				'appname' => 'MicrosoftPreview',
				'appversion' => '2.0',
				'browserreleased' => '2020-04-02'
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
			],
			'Mozilla/5.0 (compatible; GoogleDocs; documents; +http://docs.google.com)' => [
				'string' => 'Mozilla/5.0 (compatible; GoogleDocs; documents; +http://docs.google.com)',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Google Docs',
				'appname' => 'GoogleDocs; documents',
				'url' => 'http://docs.google.com'
			],
			'Mozilla/5.0 (compatible; GoogleDocs; apps-presentations; +http://docs.google.com)' => [
				'string' => 'Mozilla/5.0 (compatible; GoogleDocs; apps-presentations; +http://docs.google.com)',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Google Docs',
				'appname' => 'GoogleDocs; apps-presentations',
				'url' => 'http://docs.google.com'
			],
			'Mozilla/5.0 (compatible; Embedly/0.2; +http://support.embed.ly/)' => [
				'string' => 'Mozilla/5.0 (compatible; Embedly/0.2; +http://support.embed.ly/)',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Embedly',
				'appname' => 'Embedly',
				'appversion' => '0.2',
				'url' => 'http://support.embed.ly/'
			],
			'Mozilla/5.0 (compatible; The Lounge IRC Client; +https://github.com/thelounge/thelounge) facebookexternalhit/1.1 Twitterbot/1.0' => [
				'string' => 'Mozilla/5.0 (compatible; The Lounge IRC Client; +https://github.com/thelounge/thelounge) facebookexternalhit/1.1 Twitterbot/1.0',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'The Lounge IRC Client',
				'appname' => 'The Lounge IRC Client',
				'appversion' => '1.1',
				'url' => 'https://github.com/thelounge/thelounge'
			],
			'HubSpot Connect 2.0 (http://dev.hubspot.com/) (namespace: domainValidationHttpClient) - BizOpsCompanies-Tq2-BizCoDomainValidationAudit' => [
				'string' => 'HubSpot Connect 2.0 (http://dev.hubspot.com/) (namespace: domainValidationHttpClient) - BizOpsCompanies-Tq2-BizCoDomainValidationAudit',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'HubSpot Connect',
				'appname' => 'domainValidationHttpClient - BizOpsCompanies-Tq2-BizCoDomainValidationAudit',
				'appversion' => '2.0',
				'url' => 'http://dev.hubspot.com/'
			],
			'HubSpot Connect 2.0 (http://dev.hubspot.com/) (namespace: hs_web_crawler) - RoadsModelsJobs-hubspot-53-domain-web-crawl' => [
				'string' => 'HubSpot Connect 2.0 (http://dev.hubspot.com/) (namespace: hs_web_crawler) - RoadsModelsJobs-hubspot-53-domain-web-crawl',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'HubSpot Connect',
				'appname' => 'hs_web_crawler - RoadsModelsJobs-hubspot-53-domain-web-crawl',
				'appversion' => '2.0',
				'url' => 'http://dev.hubspot.com/'
			],
			'HubSpot Connect 2.0 (http://dev.hubspot.com/) (namespace: filemanager.downloads.http.client) - contentfilemanagerdaemons-downloadFromUrlTq2Worke' => [
				'string' => 'HubSpot Connect 2.0 (http://dev.hubspot.com/) (namespace: filemanager.downloads.http.client) - contentfilemanagerdaemons-downloadFromUrlTq2Worke',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'HubSpot Connect',
				'appname' => 'filemanager.downloads.http.client - contentfilemanagerdaemons-downloadFromUrlTq2Worke',
				'appversion' => '2.0',
				'url' => 'http://dev.hubspot.com/'
			],
			'DropboxPreviewBot/1.0' => [
				'string' => 'DropboxPreviewBot/1.0',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Dropbox Preview Bot',
				'appname' => 'DropboxPreviewBot',
				'appversion' => '1.0'
			],
			'WordPress/6.1.1; https://www.getsafeonline.org' => [
				'string' => 'WordPress/6.1.1; https://www.getsafeonline.org',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'WordPress',
				'appname' => 'WordPress',
				'appversion' => '6.1.1',
				'url' => 'https://www.getsafeonline.org'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'ChatGPT User',
				'appname' => 'ChatGPT-User',
				'appversion' => '1.0',
				'url' => 'https://openai.com/bot'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testAds() : void {
		$strings = [
			'Mozilla/5.0 (compatible; proximic; +https://www.comscore.com/Web-Crawler)' => [
				'string' => 'Mozilla/5.0 (compatible; proximic; +https://www.comscore.com/Web-Crawler)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Proximic',
				'appname' => 'proximic',
				'url' => 'https://www.comscore.com/Web-Crawler'
			],
			'AdsBot-Google (+http://www.google.com/adsbot.html)' => [
				'string' => 'AdsBot-Google (+http://www.google.com/adsbot.html)',
				'url' => 'http://www.google.com/adsbot.html',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Google Bot',
				'appname' => 'AdsBot-Google'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Google Bot',
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
				'engineversion' => '81.0.4044.138',
				'browserreleased' => '2020-05-05'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Google Bot',
				'appname' => 'AdsBot-Google-Mobile',
				'url' => 'http://www.google.com/mobile/adsbot.html',
				'architecture' => 'Arm',
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
				'browserversion' => '14.1.2',
				'browserreleased' => '2021-04-26'
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
				'browser' => 'Samsung Internet',
				'browserversion' => '3.3',
				'engine' => 'Blink',
				'engineversion' => '38.0.2125.102'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
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
				'appversion' => '190628.140653',
				'browserreleased' => '2019-06-18'
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
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Google-Safety; +http://www.google.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Google-Safety; +http://www.google.com/bot.html)',
				'type' => 'robot',
				'category' => 'validator',
				'vendor' => 'Google',
				'device' => 'Nexus',
				'model' => '5X',
				'build' => 'MMB29P',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'engine' => 'Blink',
				'engineversion' => '41.0.2272.96',
				'browser' => 'Chrome',
				'browserversion' => '41.0.2272.96',
				'app' => 'Google Safety',
				'appname' => 'Google-Safety',
				'url' => 'http://www.google.com/bot.html'
			],
			'Wheregoes.com Redirect Checker/1.0' => [
				'string' => 'Wheregoes.com Redirect Checker/1.0',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'Wheregoes.com Redirect Checker',
				'appname' => 'Wheregoes.com Redirect Checker',
				'appversion' => '1.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testCrawlers() : void {
		$strings = [
			'Mozilla/5.0 (compatible; SemrushBot/7~bl-slave; http://www.semrush.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; SemrushBot/7~bl-slave; http://www.semrush.com/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Semrush Bot',
				'appname' => 'SemrushBot',
				'appversion' => '7',
				'url' => 'http://www.semrush.com/bot.html'
			],
			'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)' => [
				'string' => 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Ahrefs Bot',
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
				'app' => 'CommonCrawl Bot',
				'appname' => 'CCBot',
				'appversion' => '2.0',
				'url' => 'https://commoncrawl.org/faq/'
			],
			'Mozilla/5.0 (compatible; Swiftbot/1.0; UID/54e1c2ebd3b687d3c8000018; +http://swiftype.com/swiftbot)' => [
				'string' => 'Mozilla/5.0 (compatible; Swiftbot/1.0; UID/54e1c2ebd3b687d3c8000018; +http://swiftype.com/swiftbot)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Swift Bot',
				'appname' => 'Swiftbot',
				'appversion' => '1.0',
				'url' => 'http://swiftype.com/swiftbot'
			],
			'magpie-crawler/1.1 (robots-txt-validator; +http://www.brandwatch.net)' => [
				'string' => 'magpie-crawler/1.1 (robots-txt-validator; +http://www.brandwatch.net)',
				'type' => 'robot',
				'app' => 'Brandwatch Magpie Crawler',
				'appname' => 'magpie-crawler',
				'category' => 'crawler',
				'appversion' => '1.1',
				'url' => 'http://www.brandwatch.net'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.10) Gecko/20050716 Thunderbird/1.0.6 - WebCrawler http://cognitiveseo.com/bot.html' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.10) Gecko/20050716 Thunderbird/1.0.6 - WebCrawler http://cognitiveseo.com/bot.html',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Web Crawler',
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
				'app' => 'OnCrawl Bot',
				'appname' => 'OnCrawl',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Probe by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Probe by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'SiteImprove Crawler',
				'appname' => 'Probe by Siteimprove.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0',
				'browserreleased' => '2012-10-26'
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
				'engineversion' => '114.0.0.0',
				'browserreleased' => '2023-06-20'
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
				'app' => 'Roger Bot',
				'appname' => 'rogerbot',
				'appversion' => '1.2',
				'url' => 'https://moz.com/help/guides/moz-procedures/what-is-rogerbot'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) LinkCheck by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) LinkCheck by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'SiteImprove Crawler',
				'appname' => 'LinkCheck by Siteimprove.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0',
				'browserreleased' => '2012-10-26'
			],
			'Mozilla/5.0 (compatible; Pro Sitemaps Generator; pro-sitemaps.com) Gecko Pro-Sitemaps/1.0' => [
				'string' => 'Mozilla/5.0 (compatible; Pro Sitemaps Generator; pro-sitemaps.com) Gecko Pro-Sitemaps/1.0',
				'type' => 'robot',
				'category' => 'crawler',
				'engine' => 'Gecko',
				'app' => 'Pro Sitemaps',
				'appname' => 'Pro-Sitemaps',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 The National Archives UK Government Web Archive: http://www.nationalarchives.gov.uk/webarchive/; webarchive@nationalarchives.gov.uk' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 The National Archives UK Government Web Archive: http://www.nationalarchives.gov.uk/webarchive/; webarchive@nationalarchives.gov.uk',
				'type' => 'robot',
				'category' => 'crawler',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '78.0.3904.97',
				'browser' => 'Chrome',
				'browserversion' => '78.0.3904.97',
				'app' => 'UK Government National Archives',
				'appname' => 'The National Archives UK Government Web Archive:',
				'url' => 'http://www.nationalarchives.gov.uk/webarchive/',
				'browserreleased' => '2019-11-06'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)',
				'type' => 'robot',
				'category' => 'crawler',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'Blink',
				'engineversion' => '56.0.2924.87',
				'browser' => 'Chrome',
				'browserversion' => '56.0.2924.87',
				'app' => 'Google Page Renderer',
				'appname' => 'Google-PageRenderer Google',
				'url' => 'https://developers.google.com/+/web/snippet/',
				'browserreleased' => '2017-02-01'
			],
			'Citoid (Wikimedia tool; learn more at https://www.mediawiki.org/wiki/Citoid)' => [
				'string' => 'Citoid (Wikimedia tool; learn more at https://www.mediawiki.org/wiki/Citoid)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Wikimedia Citoid',
				'appname' => 'Citoid',
				'url' => 'https://www.mediawiki.org/wiki/Citoid'
			],
			'Mozilla/5.0 (compatible; SemrushBot-BA; +http://www.semrush.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; SemrushBot-BA; +http://www.semrush.com/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Semrush Bot',
				'appname' => 'SemrushBot-BA',
				'url' => 'http://www.semrush.com/bot.html'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25 (compatible; SiteAuditBot/0.97; +http://www.semrush.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25 (compatible; SiteAuditBot/0.97; +http://www.semrush.com/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '10A5376e',
				'architecture' => 'Arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '6.0',
				'engine' => 'WebKit',
				'engineversion' => '536.26',
				'browser' => 'Safari',
				'browserversion' => '6.0',
				'app' => 'Semrush Bot',
				'appname' => 'SiteAuditBot',
				'appversion' => '0.97',
				'url' => 'http://www.semrush.com/bot.html',
				'browserreleased' => '2012-07-25'
			],
			'Mozilla/5.0 (compatible; SiteAuditBot/0.97; +http://www.semrush.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; SiteAuditBot/0.97; +http://www.semrush.com/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Semrush Bot',
				'appname' => 'SiteAuditBot',
				'appversion' => '0.97',
				'url' => 'http://www.semrush.com/bot.html'
			],
			'Mozilla/5.0 (compatible; SemrushBot-SI/0.97; +http://www.semrush.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; SemrushBot-SI/0.97; +http://www.semrush.com/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Semrush Bot',
				'appname' => 'SemrushBot-SI',
				'appversion' => '0.97',
				'url' => 'http://www.semrush.com/bot.html'
			],
			'Mozilla/5.0 (compatible; SemrushBot-OCOB/1; +https://www.semrush.com/bot/)' => [
				'string' => 'Mozilla/5.0 (compatible; SemrushBot-OCOB/1; +https://www.semrush.com/bot/)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Semrush Bot',
				'appname' => 'SemrushBot-OCOB',
				'appversion' => '1',
				'url' => 'https://www.semrush.com/bot/'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) SiteCheck-sitecrawl by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) SiteCheck-sitecrawl by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0',
				'app' => 'SiteImprove Crawler',
				'appname' => 'SiteCheck-sitecrawl by Siteimprove.com',
				'url' => 'https://siteimprove.com',
				'browserreleased' => '2012-10-26'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) LinkCheck by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) LinkCheck by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0',
				'app' => 'SiteImprove Crawler',
				'appname' => 'LinkCheck by Siteimprove.com',
				'url' => 'https://siteimprove.com',
				'browserreleased' => '2012-10-26'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Image size by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Image size by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0',
				'app' => 'SiteImprove Crawler',
				'appname' => 'Image size by Siteimprove.com',
				'url' => 'https://siteimprove.com',
				'browserreleased' => '2012-10-26'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Probe by Siteimprove.com' => [
				'string' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Probe by Siteimprove.com',
				'type' => 'robot',
				'category' => 'crawler',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0',
				'app' => 'SiteImprove Crawler',
				'appname' => 'Probe by Siteimprove.com',
				'url' => 'https://siteimprove.com',
				'browserreleased' => '2012-10-26'
			],
			'INetBot/2.0 (http://www.inetdex.com; bot@inetdex.com)' => [
				'string' => 'INetBot/2.0 (http://www.inetdex.com; bot@inetdex.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'INet Bot',
				'appname' => 'INetBot',
				'appversion' => '2.0',
				'url' => 'http://www.inetdex.com'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Amazonbot-Video/0.1; +https://developer.amazon.com/support/amazonbot)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Amazonbot-Video/0.1; +https://developer.amazon.com/support/amazonbot)',
				'type' => 'robot',
				'category' => 'crawler',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Mac OS X',
				'platformversion' => '10.10.1',
				'engine' => 'WebKit',
				'engineversion' => '600.2.5',
				'browser' => 'Safari',
				'browserversion' => '8.0.2',
				'app' => 'Amazon Bot',
				'appname' => 'Amazonbot-Video',
				'appversion' => '0.1',
				'url' => 'https://developer.amazon.com/support/amazonbot',
				'browserreleased' => '2014-06-06'
			],
			'Mozilla/5.0 (compatible; MixrankBot; crawler@mixrank.com)' => [
				'string' => 'Mozilla/5.0 (compatible; MixrankBot; crawler@mixrank.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Mixrank Bot',
				'appname' => 'MixrankBot'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.5845.96 Safari/537.36 DatadogSynthetics' => [
				'string' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.5845.96 Safari/537.36 DatadogSynthetics',
				'type' => 'robot',
				'category' => 'scraper',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'Blink',
				'engineversion' => '116.0.5845.96',
				'browser' => 'Chrome',
				'browserversion' => '116.0.5845.96',
				'app' => 'Datadog Synthetics',
				'appname' => 'DatadogSynthetics',
				'browserreleased' => '2023-08-14'
			],
			'amazon-kendra-customer-id-78359eed0b12df1a4985067b27f154ba9cdabd0a87dad0abfea1bfce2d520d24fd3df3f70fec4eb666f51ea3967c2339' => [
				'string' => 'amazon-kendra-customer-id-78359eed0b12df1a4985067b27f154ba9cdabd0a87dad0abfea1bfce2d520d24fd3df3f70fec4eb666f51ea3967c2339',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Amazon Bot',
				'appname' => 'Amazon Kendra'
			],
			'omgili/0.5 +https://omgili.com' => [
				'string' => 'omgili/0.5 +https://omgili.com',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Webz.io',
				'appname' => 'omgili',
				'appversion' => '0.5',
				'url' => 'https://omgili.com'
			],
			'MeltwaterNews www.meltwater.com' => [
				'string' => 'MeltwaterNews www.meltwater.com',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Meltwater News',
				'appname' => 'MeltwaterNews',
				'url' => 'www.meltwater.com'
			],
			'Mozilla/5.0 (compatible; AwarioBot/1.0; +https://awario.com/bots.html)' => [
				'string' => 'Mozilla/5.0 (compatible; AwarioBot/1.0; +https://awario.com/bots.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Awario Bot',
				'appname' => 'AwarioBot',
				'appversion' => '1.0',
				'url' => 'https://awario.com/bots.html'
			],
			'AwarioSmartBot/1.0 (+https://awario.com/bots.html; bots@awario.com)' => [
				'string' => 'AwarioSmartBot/1.0 (+https://awario.com/bots.html; bots@awario.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Awario Smart Bot',
				'appname' => 'AwarioSmartBot',
				'appversion' => '1.0',
				'url' => 'https://awario.com/bots.html'
			],
			'AwarioRssBot/1.0 (+https://awario.com/bots.html; bots@awario.com)' => [
				'string' => 'AwarioRssBot/1.0 (+https://awario.com/bots.html; bots@awario.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Awario Rss Bot',
				'appname' => 'AwarioRssBot',
				'appversion' => '1.0',
				'url' => 'https://awario.com/bots.html'
			],
			'ICC-Crawler/3.0 (Mozilla-compatible; ; https://ucri.nict.go.jp/en/icccrawler.html)' => [
				'string' => 'ICC-Crawler/3.0 (Mozilla-compatible; ; https://ucri.nict.go.jp/en/icccrawler.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'ICC Crawler',
				'appname' => 'ICC-Crawler',
				'appversion' => '3.0',
				'url' => 'https://ucri.nict.go.jp/en/icccrawler.html'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testScrapers() : void {
		$strings = [
			'CyotekWebCopy/1.9 CyotekHTTP/6.4' => [
				'string' => 'CyotekWebCopy/1.9 CyotekHTTP/6.4',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Cyotek Web Copy',
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
			'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0 (compatible; mozilla/5.0 (macintosh; intel mac os x 10_13_5) applewebkit/537.36 (khtml, like gecko) chrome/67.0.3396.99 safari/537.36; +https://github.com/rom1504/img2dataset)' => [
				'string' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0 (compatible; mozilla/5.0 (macintosh; intel mac os x 10_13_5) applewebkit/537.36 (khtml, like gecko) chrome/67.0.3396.99 safari/537.36; +https://github.com/rom1504/img2dataset)',
				'type' => 'robot',
				'category' => 'scraper',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Mac OS X',
				'platformversion' => '10.13.5',
				'engine' => 'Gecko',
				'engineversion' => '72.0',
				'browser' => 'Firefox',
				'browserversion' => '72.0',
				'url' => 'https://github.com/rom1504/img2dataset',
				'browserreleased' => '2020-01-07'
			],
			'grub-client-1.5.3; (grub-client-1.5.3; Crawl your own stuff with http://grub.org)' => [
				'string' => 'grub-client-1.5.3; (grub-client-1.5.3; Crawl your own stuff with http://grub.org)',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Grub Client',
				'appname' => 'grub-client',
				'appversion' => '1.5.3',
				'url' => 'http://grub.org'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testMonitors() : void {
		$strings = [
			'Mozilla/5.0+(compatible; UptimeRobot/2.0; http://www.uptimerobot.com/)' => [
				'string' => 'Mozilla/5.0+(compatible; UptimeRobot/2.0; http://www.uptimerobot.com/)',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Uptime Robot',
				'appname' => 'UptimeRobot',
				'appversion' => '2.0',
				'url' => 'http://www.uptimerobot.com/'
			],
			'Pingdom.com_bot_version_1.4_(http://www.pingdom.com/)' => [
				'string' => 'Pingdom.com_bot_version_1.4_(http://www.pingdom.com/)',
				'type' => 'robot',
				'app' => 'Pingdom Bot',
				'appname' => 'Pingdom.com_bot_version_1.4',
				'category' => 'monitor',
				'appversion' => '1.4',
				'url' => 'http://www.pingdom.com/'
			],
			'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) browser/22.1.0 Chrome/108.0.5359.179 Electron/22.1.0 Safari/537.36 PingdomTMS/22.1' => [
				'string' => 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) browser/22.1.0 Chrome/108.0.5359.179 Electron/22.1.0 Safari/537.36 PingdomTMS/22.1',
				'type' => 'robot',
				'app' => 'Pingdom Bot',
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
				'engineversion' => '108.0.5359.179',
				'browserreleased' => '2023-01-10'
			],
			'Mozilla/5.0 (compatible; PRTG Network Monitor (www.paessler.com); Windows)' => [
				'string' => 'Mozilla/5.0 (compatible; PRTG Network Monitor (www.paessler.com); Windows)',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Paessler PRTG Bot',
				'appname' => 'PRTG Network Monitor',
				'url' => 'www.paessler.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows'
			],
			'Mozilla/5.0 (compatible; PRTGCloudBot/1.0; +https://www.paessler.com/prtgcloudbot; for_[licensehash])' => [
				'string' => 'Mozilla/5.0 (compatible; PRTGCloudBot/1.0; +https://www.paessler.com/prtgcloudbot; for_[licensehash])',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Paessler PRTG Bot',
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
				'architecture' => 'Arm',
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
				'browserversion' => '13.0.3',
				'browserreleased' => '2020-03-24'
			],
			'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk' => [
				'string' => 'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'NCSC Web Check',
				'appname' => 'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk'
			],
			'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)' => [
				'string' => 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)',
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Censys Inspect',
				'appname' => 'CensysInspect',
				'appversion' => '1.1',
				'url' => 'https://about.censys.io/'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 (StatusCake)' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 (StatusCake)',
				'type' => 'robot',
				'category' => 'monitor',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '129.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '129.0.0.0',
				'browserreleased' => '2024-10-15',
				'app' => 'Status Cake',
				'appname' => 'StatusCake'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testAi() : void {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML\, like Gecko) Version/8.0.2 Safari/600.2.5 (Amazonbot/0.1; +https://developer.amazon.com/support/amazonbot)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML\, like Gecko) Version/8.0.2 Safari/600.2.5 (Amazonbot/0.1; +https://developer.amazon.com/support/amazonbot)',
				'type' => 'robot',
				'category' => 'ai',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Mac OS X',
				'platformversion' => '10.10.1',
				'engine' => 'WebKit',
				'engineversion' => '600.2.5',
				'browser' => 'Safari',
				'browserversion' => '8.0.2',
				'app' => 'Amazon Bot',
				'appname' => 'Amazonbot',
				'appversion' => '0.1',
				'url' => 'https://developer.amazon.com/support/amazonbot',
				'browserreleased' => '2014-06-06'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 (.NET CLR 3.5.30729; Diffbot/0.1; +http://www.diffbot.com)' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 (.NET CLR 3.5.30729; Diffbot/0.1; +http://www.diffbot.com)',
				'type' => 'robot',
				'category' => 'ai',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Gecko',
				'engineversion' => '20090729',
				'browser' => 'Firefox',
				'browserversion' => '3.5.2',
				'language' => 'en-US',
				'app' => 'Diff Bot',
				'appname' => 'Diffbot',
				'appversion' => '0.1',
				'url' => 'http://www.diffbot.com',
				'framework' => '.NET Common Language Runtime',
				'frameworkversion' => '3.5.30729',
				'browserreleased' => '2009-06-30'
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1.1 Safari/605.1.15 (Applebot/0.1)' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1.1 Safari/605.1.15 (Applebot/0.1)',
				'type' => 'robot',
				'category' => 'ai',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Mac OS X',
				'platformversion' => '10.14.5',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '12.1.1',
				'app' => 'Apple Bot',
				'appname' => 'Applebot',
				'appversion' => '0.1',
				'browserreleased' => '2019-03-25'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 8_1 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12B410 Safari/600.1.4 (Applebot/0.1; +http://www.apple.com/go/applebot)' => [
				'string' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_1 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12B410 Safari/600.1.4 (Applebot/0.1; +http://www.apple.com/go/applebot)',
				'type' => 'robot',
				'category' => 'ai',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '12B410',
				'architecture' => 'Arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '8.1',
				'engine' => 'WebKit',
				'engineversion' => '600.1.4',
				'browser' => 'Safari',
				'browserversion' => '8.0',
				'app' => 'Apple Bot',
				'appname' => 'Applebot',
				'appversion' => '0.1',
				'url' => 'http://www.apple.com/go/applebot',
				'browserreleased' => '2014-06-06'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; PerplexityBot/1.0; +https://perplexity.ai/perplexitybot)' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; PerplexityBot/1.0; +https://perplexity.ai/perplexitybot)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Perplexity Bot',
				'appname' => 'PerplexityBot',
				'appversion' => '1.0',
				'url' => 'https://perplexity.ai/perplexitybot'
			],
			'Mozilla/5.0 (compatible; YouBot/1.0; +https://about.you.com/youbot/)' => [
				'string' => 'Mozilla/5.0 (compatible; YouBot/1.0; +https://about.you.com/youbot/)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'You Bot',
				'appname' => 'YouBot',
				'appversion' => '1.0',
				'url' => 'https://about.you.com/youbot/'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; GPTBot/1.1; +https://openai.com/gptbot' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; GPTBot/1.1; +https://openai.com/gptbot',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'GPT Bot',
				'appname' => 'GPTBot',
				'appversion' => '1.1',
				'url' => 'https://openai.com/gptbot'
			],
			'Mozilla/5.0 AppleWebKit/605.1.15 (KHTML, like Gecko; compatible; iAskBot/1.0; +https://iask.ai/) Chrome/120.0.6099.119 Safari/605.1.15' => [
				'string' => 'Mozilla/5.0 AppleWebKit/605.1.15 (KHTML, like Gecko; compatible; iAskBot/1.0; +https://iask.ai/) Chrome/120.0.6099.119 Safari/605.1.15',
				'type' => 'robot',
				'category' => 'ai',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Chrome',
				'browserversion' => '120.0.6099.119',
				'app' => 'iAsk Bot',
				'appname' => 'iAskBot',
				'appversion' => '1.0',
				'url' => 'https://iask.ai/',
				'browserreleased' => '2023-12-20'
			],
			'Mozilla/5.0 (compatible; wpbot/1.0; +https://forms.gle/ajBaxygz9jSR8p8G9)' => [
				'string' => 'Mozilla/5.0 (compatible; wpbot/1.0; +https://forms.gle/ajBaxygz9jSR8p8G9)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Wpbot',
				'appname' => 'wpbot',
				'appversion' => '1.0',
				'url' => 'https://forms.gle/ajBaxygz9jSR8p8G9'
			],
			'Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; https://zhanzhang.toutiao.com/)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; https://zhanzhang.toutiao.com/)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'ByteDance Spider',
				'appname' => 'Bytespider',
				'url' => 'https://zhanzhang.toutiao.com/',
				'platform' => 'Android',
				'platformversion' => '5.0',
				'kernel' => 'Linux'
			],
			'Mozilla/5.0 (compatible; ImagesiftBot; +imagesift.com)' => [
				'string' => 'Mozilla/5.0 (compatible; ImagesiftBot; +imagesift.com)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Imagesift Bot',
				'appname' => 'ImagesiftBot'
			],
			'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)' => [
				'string' => 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Meta External Agent',
				'appname' => 'meta-externalagent',
				'appversion' => '1.1',
				'url' => 'https://developers.facebook.com/docs/sharing/webmasters/crawler'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 (.NET CLR 3.5.30729; Diffbot/0.1; +http://www.diffbot.com)' => [
				'string' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 (.NET CLR 3.5.30729; Diffbot/0.1; +http://www.diffbot.com)',
				'type' => 'robot',
				'category' => 'ai',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Gecko',
				'engineversion' => '20090729',
				'browser' => 'Firefox',
				'browserversion' => '3.5.2',
				'language' => 'en-US',
				'app' => 'Diff Bot',
				'appname' => 'Diffbot',
				'appversion' => '0.1',
				'framework' => '.NET Common Language Runtime',
				'frameworkversion' => '3.5.30729',
				'url' => 'http://www.diffbot.com',
				'browserreleased' => '2009-06-30'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; PerplexityBot/1.0; +https://perplexity.ai/perplexitybot)' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; PerplexityBot/1.0; +https://perplexity.ai/perplexitybot)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Perplexity Bot',
				'appname' => 'PerplexityBot',
				'appversion' => '1.0',
				'url' => 'https://perplexity.ai/perplexitybot'
			],
			'Timpibot/0.8 (+http://www.timpi.io)' => [
				'string' => 'Timpibot/0.8 (+http://www.timpi.io)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Timpi Bot',
				'appname' => 'Timpibot',
				'appversion' => '0.8',
				'url' => 'http://www.timpi.io'
			],
			'Mozilla/5.0 (compatible) AI2Bot (+https://www.allenai.org/crawler)' => [
				'string' => 'Mozilla/5.0 (compatible) AI2Bot (+https://www.allenai.org/crawler)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'AI2 Bot',
				'appname' => 'AI2Bot',
				'url' => 'https://www.allenai.org/crawler'
			],
			'Mozilla/5.0 (compatible; aiHitBot/1.0; +http://www.aihit.com/)' => [
				'string' => 'Mozilla/5.0 (compatible; aiHitBot/1.0; +http://www.aihit.com/)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Ai Hit Bot',
				'appname' => 'aiHitBot',
				'appversion' => '1.0',
				'url' => 'http://www.aihit.com/'
			],
			'Brightbot 1.0' => [
				'string' => 'Brightbot 1.0',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Bright Bot',
				'appname' => 'BrightBot',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (compatible; AddSearchBot/1.0; +http://www.addsearch.com/bot/)' => [
				'string' => 'Mozilla/5.0 (compatible; AddSearchBot/1.0; +http://www.addsearch.com/bot/)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Add Search Bot',
				'appname' => 'AddSearchBot',
				'appversion' => '1.0',
				'url' => 'http://www.addsearch.com/bot/'
			],
			'Mozilla/5.0 (compatible; anthropic-ai/1.0; +http://www.anthropic.com/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; anthropic-ai/1.0; +http://www.anthropic.com/bot.html)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Anthropic Ai',
				'appname' => 'anthropic-ai',
				'appversion' => '1.0',
				'url' => 'http://www.anthropic.com/bot.html'
			],
			'bigsur.ai (+https://www.bigsur.ai)' => [
				'string' => 'bigsur.ai (+https://www.bigsur.ai)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Bigsur.ai',
				'appname' => 'bigsur.ai',
				'url' => 'https://www.bigsur.ai'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Claude Bot',
				'appname' => 'ClaudeBot',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Claude-User/1.0; +Claude-User@anthropic.com)' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Claude-User/1.0; +Claude-User@anthropic.com)',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Claude User',
				'appname' => 'Claude-User',
				'appversion' => '1.0'
			],
			'Google-CloudVertexBot' => [
				'string' => 'Google-CloudVertexBot',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Google Cloud Vertex Bot',
				'appname' => 'Google-CloudVertexBot'
			],
			'Mozilla/5.0 (compatible; cohere-ai/1.0; +http://www.cohere.ai/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; cohere-ai/1.0; +http://www.cohere.ai/bot.html)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Cohere Ai',
				'appname' => 'cohere-ai',
				'appversion' => '1.0',
				'url' => 'http://www.cohere.ai/bot.html'
			],
			'DuckAssistBot/1.2; (+http://duckduckgo.com/duckassistbot.html)' => [
				'string' => 'DuckAssistBot/1.2; (+http://duckduckgo.com/duckassistbot.html)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Duck Assist Bot',
				'appname' => 'DuckAssistBot',
				'appversion' => '1.2',
				'url' => 'http://duckduckgo.com/duckassistbot.html'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Gemini-Deep-Research; +https://gemini.google/overview/deep-research/) Chrome/135.0.0.0 Safari/537.36' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Gemini-Deep-Research; +https://gemini.google/overview/deep-research/) Chrome/135.0.0.0 Safari/537.36',
				'type' => 'robot',
				'category' => 'ai',
				'engine' => 'Blink',
				'engineversion' => '135.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '135.0.0.0',
				'browserreleased' => '2025-05-06',
				'app' => 'Gemini Deep Research',
				'appname' => 'Gemini-Deep-Research',
				'url' => 'https://gemini.google/overview/deep-research/'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; MistralAI-User/1.0; +https://docs.mistral.ai/robots)' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; MistralAI-User/1.0; +https://docs.mistral.ai/robots)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Mistral AI User',
				'appname' => 'MistralAI-User',
				'appversion' => '1.0',
				'url' => 'https://docs.mistral.ai/robots'
			],
			'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PanguBot;pangubot@huawei.com)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PanguBot;pangubot@huawei.com)',
				'type' => 'robot',
				'category' => 'ai',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'app' => 'Pangu Bot',
				'appname' => 'PanguBot'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Perplexity-User/1.0; +https://perplexity.ai/perplexity-user)' => [
				'string' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Perplexity-User/1.0; +https://perplexity.ai/perplexity-user)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Perplexity User',
				'appname' => 'Perplexity-User',
				'appversion' => '1.0',
				'url' => 'https://perplexity.ai/perplexity-user'
			],
			'Mozilla/5.0 (compatible; QualifiedBot/1.0; +https://www.qualified.com/legal/qualified-crawler-user-agent)' => [
				'string' => 'Mozilla/5.0 (compatible; QualifiedBot/1.0; +https://www.qualified.com/legal/qualified-crawler-user-agent)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Qualified Bot',
				'appname' => 'QualifiedBot',
				'appversion' => '1.0',
				'url' => 'https://www.qualified.com/legal/qualified-crawler-user-agent'
			],
			'Mozilla/5.0 (compatible; SBIntuitionsBot/0.1; +https://www.sbintuitions.co.jp/en/bot/)' => [
				'string' => 'Mozilla/5.0 (compatible; SBIntuitionsBot/0.1; +https://www.sbintuitions.co.jp/en/bot/)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'SB Intuitions Bot',
				'appname' => 'SBIntuitionsBot',
				'appversion' => '0.1',
				'url' => 'https://www.sbintuitions.co.jp/en/bot/'
			],
			'Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; TikTokSpider; ttspider-feedback@tiktok.com)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; TikTokSpider; ttspider-feedback@tiktok.com)',
				'type' => 'robot',
				'category' => 'feed',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '5.0',
				'app' => 'Tik Tok Spider',
				'appname' => 'TikTokSpider'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}
}