<?php
declare(strict_types = 1);
use hexydec\agentzero\agentzero;

final class defaultTest extends \PHPUnit\Framework\TestCase {

	public function testStrings() : void {
		$strings = [
			'eMClient/10.0.3266.0' => [
				'string' => 'eMClient/10.0.3266.0',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'eM Client',
				'appname' => 'eMClient',
				'appversion' => '10.0.3266.0'
			],
			'MVision/1.0' => [
				'string' => 'MVision/1.0',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'MVision',
				'appname' => 'MVision',
				'appversion' => '1.0'
			],
			'The Knowledge AI' => [
				'string' => 'The Knowledge AI',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'The Knowledge AI',
				'appname' => 'The Knowledge AI'
			],
			'Penthouse Critical Path CSS Generator' => [
				'string' => 'Penthouse Critical Path CSS Generator',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Penthouse Critical Path CSS Generator',
				'appname' => 'Penthouse Critical Path CSS Generator'
			],
			'NetAPI v1' => [
				'string' => 'NetAPI v1',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Net API',
				'appname' => 'NetAPI',
				'appversion' => '1'
			],
			'Squiz Matrix v6.25.0' => [
				'string' => 'Squiz Matrix v6.25.0',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Squiz Matrix',
				'appname' => 'Squiz Matrix',
				'appversion' => '6.25.0'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}