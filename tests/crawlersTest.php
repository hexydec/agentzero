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
			'SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)' => [
				'url' => 'http://www.google.com/bot.html',
				'type' => 'robot',
				'category' => 'search',
				'browser' => 'UP.Browser',
				'browserversion' => '6.2.3.3.c.1.101',
				'appversion' => '2.1',
				'app' => 'Googlebot-Mobile',
				'device' => 'SGH-E250',
				'build' => '1.0',
				'vendor' => 'Samsung'
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
				'vendor' => 'Google',
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
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'platform' => 'Mac OS X',
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
				'browserversion' => '605.1.15'
			],
			'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/2.0; +https://help.mail.ru/webmaster/indexing/robots)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Mail.RU_Bot',
				'appversion' => '2.0',
				'url' => 'https://help.mail.ru/webmaster/indexing/robots',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'architecture' => 'x86',
				'bits' => 64
			],
			'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1; 360Spider(compatible; HaosouSpider; http://www.haosoucom/help/help_3_2.html)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => '360Spider',
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
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Sogou web spider',
				'appversion' => '4.0',
				'url' => 'http://www.sogou.com/docs/help/webmasters.htm#07'
			],
			'Googlebot-Image/1.0' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Googlebot-Image',
				'appversion' => '1.0'
			],
			'Googlebot-Video/1.0' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Googlebot-Video',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012; Storebot-Google/1.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Storebot-Google',
				'appversion' => '1.0',
				'vendor' => 'Google',
				'device' => 'Pixel 2',
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
				'type' => 'robot',
				'category' => 'search',
				'app' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '103.0.5060.134',
				'engineversion' => '103.0.5060.134'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'vendor' => 'Google',
				'device' => 'Nexus 5X',
				'build' => 'MMB29P',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0 Mobile',
				'engineversion' => '80.0.345.0 Mobile'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'type' => 'robot',
				'app' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'category' => 'search',
				'architecture' => 'arm',
				'bits' => '64',
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '7.0',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '11A465',
				'engine' => 'WebKit',
				'engineversion' => '537.51.1',
				'browser' => 'Safari',
				'browserversion' => '9537.53'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; adidxbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'adidxbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'architecture' => 'arm',
				'bits' => '64',
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '7.0',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '11A465',
				'engine' => 'WebKit',
				'engineversion' => '537.51.1',
				'browser' => 'Safari',
				'browserversion' => '9537.53'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/80.0.345.0 Safari/537.36' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'bingbot',
				'appversion' => '2.0',
				'url' => 'http://www.bing.com/bingbot.htm',
				'vendor' => 'Google',
				'device' => 'Nexus 5X',
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
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Bytespider',
				'url' => 'https://zhanzhang.toutiao.com/',
				'device' => 'Mobile',
				'platform' => 'Android',
				'platformversion' => '5.0',
				'kernel' => 'Linux'
			],
			'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'PetalBot',
				'url' => 'https://webmaster.petalsearch.com/site/petalbot',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'kernel' => 'Linux'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
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
			'FeedFetcher-Google; (+http://www.google.com/feedfetcher.html)' => [
				'url' => 'http://www.google.com/feedfetcher.html',
				'type' => 'robot',
				'app' => 'FeedFetcher-Google',
				'category' => 'feed'
			],
			'GoogleProducer; (+http://goo.gl/7y4SX)' => [
				'url' => 'http://goo.gl/7y4SX',
				'type' => 'robot',
				'app' => 'GoogleProducer',
				'category' => 'feed'
			],
			'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview) Chrome/80.0.345.0 Safari/537.36' => [
				'url' => 'https://aka.ms/MicrosoftPreview',
				'type' => 'robot',
				'category' => 'feed',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0',
				'app' => 'MicrosoftPreview',
				'appversion' => '2.0'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.345.0 Mobile Safari/537.36  (compatible; MicrosoftPreview/2.0; +https://aka.ms/MicrosoftPreview)' => [
				'url' => 'https://aka.ms/MicrosoftPreview',
				'type' => 'robot',
				'category' => 'feed',
				'vendor' => 'Google',
				'device' => 'Nexus 5X',
				'build' => 'MMB29P',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'kernel' => 'Linux',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '80.0.345.0',
				'engineversion' => '80.0.345.0',
				'app' => 'MicrosoftPreview',
				'appversion' => '2.0'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testAds() {
		$strings = [
			'Mozilla/5.0 (compatible; proximic; +https://www.comscore.com/Web-Crawler)' => [
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'proximic',
				'url' => 'https://www.comscore.com/Web-Crawler'
			],
			'AdsBot-Google (+http://www.google.com/adsbot.html)' => [
				'url' => 'http://www.google.com/adsbot.html',
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'AdsBot-Google'
			],
			'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)' => [
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'AdsBot-Google-Mobile',
				'url' => 'http://www.google.com/mobile/adsbot.html',
				'vendor' => 'Google',
				'device' => 'Nexus 5X',
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
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'AdsBot-Google-Mobile',
				'url' => 'http://www.google.com/mobile/adsbot.html',
				'architecture' => 'arm',
				'bits' => '64',
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '14.7.1',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '604.1'
			],
			'Mozilla/5.0 (Linux; Android 5.0.2; SAMSUNG SM-T550 Build/LRX22G) adbeat.com/policy AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/3.3 Chrome/38.0.2125.102 Safari/537.36' => [
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Adbeat',
				'url' => 'adbeat.com/policy',
				'vendor' => 'Samsung',
				'device' => 'SM-T550',
				'build' => 'LRX22G',
				'platform' => 'Android',
				'platformversion' => '5.0.2',
				'kernel' => 'Linux',
				'browser' => 'SamsungBrowser',
				'browserversion' => '3.3',
				'engine' => 'Blink',
				'engineversion' => '38.0.2125.102'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testVerification() {
		$strings = [
			'Mozilla/5.0 (compatible; Google-Site-Verification/1.0)' => [
				'type' => 'robot',
				'category' => 'checker',
				'app' => 'Google-Site-Verification',
				'appversion' => '1.0'
			],
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testCrawlers() {
		$strings = [
			'Mozilla/5.0 (compatible; SemrushBot/7~bl-slave; http://www.semrush.com/bot.html)' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'SemrushBot',
				'appversion' => '7',
				'url' => 'http://www.semrush.com/bot.html'
			],
			'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'AhrefsBot',
				'appversion' => '7.0',
				'url' => 'http://ahrefs.com/robot/'
			],
			'MJ12bot/v1.1.2 (http://majestic12.co.uk/bot.php?+)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'MJ12bot',
				'appversion' => '1.1.2',
				'url' => 'http://majestic12.co.uk/bot.php'
			],
			'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'MJ12bot',
				'appversion' => '1.4.8',
				'url' => 'http://mj12bot.com/'
			],
			'Mozilla/5.0 (compatible; MJ12bot/v1.4.8 (domain ownership verifier); http://mj12bot.com)' => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'MJ12bot',
				'appversion' => '1.4.8',
				'url' => 'http://mj12bot.com'
			],
			'CCBot/2.0 (https://commoncrawl.org/faq/)' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'CCBot',
				'appversion' => '2.0',
				'url' => 'https://commoncrawl.org/faq/'
			],
			'Mozilla/5.0 (compatible; Swiftbot/1.0; UID/54e1c2ebd3b687d3c8000018; +http://swiftype.com/swiftbot)' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Swiftbot',
				'appversion' => '1.0',
				'url' => 'http://swiftype.com/swiftbot'
			],
			'magpie-crawler/1.1 (robots-txt-checker; +http://www.brandwatch.net)' => [
				'type' => 'robot',
				'app' => 'magpie-crawler',
				'category' => 'crawler',
				'appversion' => '1.1',
				'url' => 'http://www.brandwatch.net'
			],
			'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.10) Gecko/20050716 Thunderbird/1.0.6 - WebCrawler http://cognitiveseo.com/bot.html' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'WebCrawler',
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
				'url' => 'http://www.oncrawl.com/',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'OnCrawl',
				'appversion' => '1.0'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) Probe by Siteimprove.com' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Siteimprove.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, Google Page Speed Insights) Chrome/114.0.0.0 Safari/537.36 OPR/100.0.0.0 Chrome-Lighthouse' => [
				'type' => 'robot',
				'category' => 'checker',
				'app' => 'Chrome-Lighthouse',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'architecture' => 'x86',
				'bits' => '64',
				'browser' => 'Opera',
				'browserversion' => '100.0.0.0',
				'engine' => 'Blink',
				'engineversion' => '114.0.0.0'
			],
			'Screaming Frog SEO Spider/19.0 Beta 1' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Screaming Frog SEO Spider',
				'appversion' => '19.0'
			],
			'rogerbot/1.2 (https://moz.com/help/guides/moz-procedures/what-is-rogerbot, rogerbot-crawler aardwolf-production-crawler-53@moz.com)' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'rogerbot',
				'appversion' => '1.2',
				'url' => 'https://moz.com/help/guides/moz-procedures/what-is-rogerbot'
			],
			'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0) LinkCheck by Siteimprove.com' => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Siteimprove.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '6.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '10.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	public function testMonitors() {
		$strings = [
			'Mozilla/5.0+(compatible; UptimeRobot/2.0; http://www.uptimerobot.com/)' => [
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'UptimeRobot',
				'appversion' => '2.0',
				'url' => 'http://www.uptimerobot.com/'
			],
			'Pingdom.com_bot_version_1.4_(http://www.pingdom.com/)' => [
				'type' => 'robot',
				'app' => 'Pingdom.com Bot',
				'category' => 'monitor',
				'appversion' => '1.4',
				'url' => 'http://www.pingdom.com/'
			],
			'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) browser/22.1.0 Chrome/108.0.5359.179 Electron/22.1.0 Safari/537.36 PingdomTMS/22.1' => [
				'type' => 'robot',
				'app' => 'PingdomTMS',
				'appversion' => '22.1',
				'category' => 'monitor',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '8.1',
				'architecture' => 'x86',
				'bits' => '64',
				'browser' => 'Chrome',
				'engine' => 'Blink',
				'browserversion' => '108.0.5359.179',
				'engineversion' => '108.0.5359.179'
			],
			'WordPress/6.1.1; https://www.getsafeonline.org' => [
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'WordPress',
				'appversion' => '6.1.1',
				'url' => 'https://www.getsafeonline.org'
			],
			'Mozilla/5.0 (compatible; PRTG Network Monitor (www.paessler.com); Windows)' => [
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'PRTG Network Monitor (www.paessler.com)',
				'url' => 'www.paessler.com',
				'kernel' => 'Windows NT',
				'platform' => 'Windows'
			],
			'Mozilla/5.0 (compatible; PRTGCloudBot/1.0; +https://www.paessler.com/prtgcloudbot; for_[licensehash])' => [
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'PRTGCloudBot',
				'appversion' => '1.0',
				'url' => 'https://www.paessler.com/prtgcloudbot'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1 Site24x7' => [
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Site24x7',
				'architecture' => 'arm',
				'bits' => '64',
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '13.2.3',
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
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}
}