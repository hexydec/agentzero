<?php
use hexydec\agentzero\agentzero;

final class appsTest extends \PHPUnit\Framework\TestCase {

	public function testApps() {
		$strings = [
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaSearchBrowser/23.51.1 BroPP/1.0 YaSearchApp/23.51.1 webOmni SA/3 Mobile Safari/537.36' => [

			],
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 YaApp_Android/23.12.1 YaSearchBrowser/23.12.1 BroPP/1.0 SA/3 Mobile Safari/537.36' => [

			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)' => [

			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}

	// public function testOffice() {
	// 	$strings = [

	// 	];
	// 	foreach ($strings AS $ua => $item) {
	// 		$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
	// 	}
	// }
}