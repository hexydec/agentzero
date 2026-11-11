<?php
declare(strict_types = 1);

final class malformedTest extends \PHPUnit\Framework\TestCase {

	public function testTypes() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 10; dpi=320)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 10; dpi=320)',
				'type' => 'human',
				'model' => 'Dpi=320',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'dpi' => 320
			],
			'X {"isDarkTheme":"1"}' => [
				'string' => 'X {"isDarkTheme":"1"}',
				'type' => 'human',
				'darkmode' => true
			],
			'X {"app":5}' => [
				'string' => 'X {"app":5}',
				'type' => 'human',
				'app' => '5',
				'appname' => '5'
			],
			'App FBDM/{model=5,width=1080,density=2.5}' => [
				'string' => 'App FBDM/{model=5,width=1080,density=2.5}',
				'app' => 'App FBDM',
				'appname' => 'App FBDM',
				'appversion' => '{model=5',
				'width' => 1080
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testMissingTokens() : void {
		$strings = [
			'Mozilla/5.0 (Fuchsia)' => [
				'string' => 'Mozilla/5.0 (Fuchsia)',
				'type' => 'human',
				'category' => 'mobile',
				'kernel' => 'Zircon',
				'platform' => 'Fuchsia'
			],
			'Mozilla/5.0 (Maemo)' => [
				'string' => 'Mozilla/5.0 (Maemo)',
				'type' => 'human',
				'category' => 'mobile',
				'kernel' => 'Linux',
				'platform' => 'Maemo'
			],
			'Mozilla/5.0 (KAIOS/2.5; Mobile)' => [
				'string' => 'Mozilla/5.0 (KAIOS/2.5; Mobile)',
				'type' => 'human',
				'category' => 'mobile',
				'architecture' => 'Arm',
				'kernel' => 'Linux',
				'platform' => 'KaiOS',
				'platformversion' => '2.5'
			],
			'Reddit/Version' => [
				'string' => 'Reddit/Version',
				'type' => 'human',
				'app' => 'Reddit',
				'appname' => 'Reddit'
			],
			'Player/LG' => [
				'string' => 'Player/LG',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Player',
				'appname' => 'Player',
				'appversion' => 'LG'
			],
			'Links' => [
				'string' => 'Links',
				'type' => 'human',
				'browser' => 'Links'
			],
			'GoogleDocs' => [
				'string' => 'GoogleDocs',
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Google Docs',
				'appname' => 'GoogleDocs; '
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}
}
