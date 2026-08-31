<?php
declare(strict_types = 1);

final class urlsTest extends \PHPUnit\Framework\TestCase {

	public function testUrls() : void {
		$strings = [
			'LinkedInBot/1.0 (compatible; Mozilla/5.0; Apache-HttpClient +http://www.linkedin.com)' => [
				'string' => 'LinkedInBot/1.0 (compatible; Mozilla/5.0; Apache-HttpClient +http://www.linkedin.com)',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'LinkedIn Bot',
				'appname' => 'LinkedInBot',
				'appversion' => '1.0',
				'url' => 'http://www.linkedin.com'
			],
			'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)' => [
				'string' => 'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Moz DotBot',
				'appname' => 'DotBot',
				'appversion' => '1.2',
				'url' => 'https://opensiteexplorer.org/dotbot',
				'email' => 'help@moz.com'
			],
			'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)',
				'type' => 'robot',
				'category' => 'search',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'app' => 'Petal Bot',
				'appname' => 'PetalBot',
				'url' => 'https://webmaster.petalsearch.com/site/petalbot'
			],
			'Mozilla/5.0 (compatible; VelenPublicWebCrawler/1.0; +https://velen.io)' => [
				'string' => 'Mozilla/5.0 (compatible; VelenPublicWebCrawler/1.0; +https://velen.io)',
				'type' => 'robot',
				'category' => 'ai',
				'app' => 'Velen Public Web Crawler',
				'appname' => 'VelenPublicWebCrawler',
				'appversion' => '1.0',
				'url' => 'https://velen.io'
			],
			'Mozilla/5.0 (compatible; DecompilationBot/0.1; +https://torus.company/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; DecompilationBot/0.1; +https://torus.company/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Decompilation Bot',
				'appname' => 'DecompilationBot',
				'appversion' => '0.1',
				'url' => 'https://torus.company/bot.html'
			],
			'Mozilla/5.0 (compatible; DataForSeoBot/1.0; +https://dataforseo.com/dataforseo-bot)' => [
				'string' => 'Mozilla/5.0 (compatible; DataForSeoBot/1.0; +https://dataforseo.com/dataforseo-bot)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'DataForSeo Bot',
				'appname' => 'DataForSeoBot',
				'appversion' => '1.0',
				'url' => 'https://dataforseo.com/dataforseo-bot'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testEmails() : void {
		$strings = [

			// the address is the only marker that this is a robot, so it falls back to a generic scraper
			'the-search-engine/0.1 bingchilling@umich.edu (Linux)' => [
				'string' => 'the-search-engine/0.1 bingchilling@umich.edu (Linux)',
				'type' => 'robot',
				'category' => 'scraper',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'email' => 'bingchilling@umich.edu'
			],
			'twoogle498@umich.edu (Linux)' => [
				'string' => 'twoogle498@umich.edu (Linux)',
				'type' => 'robot',
				'category' => 'scraper',
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'email' => 'twoogle498@umich.edu'
			],

			// written as a mailto: url, behind the plus that marks a contact detail
			'NerdmanLoopCrawler/0.7 (+mailto:marc.tacquard@gmail.com)' => [
				'string' => 'NerdmanLoopCrawler/0.7 (+mailto:marc.tacquard@gmail.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Nerdman Loop Crawler',
				'appname' => 'NerdmanLoopCrawler',
				'appversion' => '0.7',
				'email' => 'marc.tacquard@gmail.com'
			],

			// written in angle brackets, alongside a URL which is captured separately
			'Pleroma 2.9.1; https://y.cubalibre.social <zenattioffice@gmail.com>; Bot' => [
				'string' => 'Pleroma 2.9.1; https://y.cubalibre.social <zenattioffice@gmail.com>; Bot',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Mastodon',
				'appname' => 'Pleroma',
				'appversion' => '2.9.1',
				'url' => 'https://y.cubalibre.social',
				'email' => 'zenattioffice@gmail.com'
			],

			// a version fragment is not an address, so this must stay a human browser and capture nothing.
			// Ecosia's own browser identification is covered separately in browsersTest, this is only here
			// to pin the email rule against a real UA using this shape rather than a synthetic one
			'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36 (Ecosia android@145.0.0.0)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36 (Ecosia android@145.0.0.0)',
				'type' => 'human',
				'category' => 'mobile',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '145.0.0.0',
				'browser' => 'Ecosia',
				'browserversion' => '145.0.0.0',
				'browserreleased' => '2026-03-10'
			],

			// neither is a package specifier, which is a robot for unrelated reasons
			'@mablhq/mabl-cli-internal-unpacked@2.91.0' => [
				'string' => '@mablhq/mabl-cli-internal-unpacked@2.91.0',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => '@mablhq',
				'appname' => '@mablhq',
				'appversion' => 'mabl-cli-internal-unpacked@2.91.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}
}