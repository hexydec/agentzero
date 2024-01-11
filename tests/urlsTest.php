<?php
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
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}