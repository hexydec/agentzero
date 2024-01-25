<?php
declare(strict_types = 1);
use hexydec\agentzero\agentzero;

final class urlsTest extends \PHPUnit\Framework\TestCase {

	public function testUrls() : void {
		$strings = [
			'LinkedInBot/1.0 (compatible; Mozilla/5.0; Apache-HttpClient +http://www.linkedin.com)' => [
				'string' => 'LinkedInBot/1.0 (compatible; Mozilla/5.0; Apache-HttpClient +http://www.linkedin.com)',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'LinkedInBot',
				'appname' => 'LinkedInBot',
				'appversion' => '1.0',
				'url' => 'http://www.linkedin.com'
			],
			'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)' => [
				'string' => 'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'DotBot',
				'appname' => 'DotBot',
				'appversion' => '1.2',
				'url' => 'https://opensiteexplorer.org/dotbot'
			],
			'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)',
				'type' => 'robot',
				'category' => 'search',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'app' => 'PetalBot',
				'appname' => 'PetalBot',
				'url' => 'https://webmaster.petalsearch.com/site/petalbot'
			],
			'Mozilla/5.0 (compatible; VelenPublicWebCrawler/1.0; +https://velen.io)' => [
				'string' => 'Mozilla/5.0 (compatible; VelenPublicWebCrawler/1.0; +https://velen.io)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'VelenPublicWebCrawler',
				'appname' => 'VelenPublicWebCrawler',
				'appversion' => '1.0',
				'url' => 'https://velen.io'
			],
			'Mozilla/5.0 (compatible; DecompilationBot/0.1; +https://torus.company/bot.html)' => [
				'string' => 'Mozilla/5.0 (compatible; DecompilationBot/0.1; +https://torus.company/bot.html)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'DecompilationBot',
				'appname' => 'DecompilationBot',
				'appversion' => '0.1',
				'url' => 'https://torus.company/bot.html'
			],
			'Mozilla/5.0 (compatible; DataForSeoBot/1.0; +https://dataforseo.com/dataforseo-bot)' => [
				'string' => 'Mozilla/5.0 (compatible; DataForSeoBot/1.0; +https://dataforseo.com/dataforseo-bot)',
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'DataForSeoBot',
				'appname' => 'DataForSeoBot',
				'appversion' => '1.0',
				'url' => 'https://dataforseo.com/dataforseo-bot'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}