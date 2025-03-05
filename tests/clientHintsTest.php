<?php
declare(strict_types = 1);

final class clientHintsTest extends \PHPUnit\Framework\TestCase {

	public function testClientHints() : void {
		$strings = [
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36' => [
				'hints' => [
					'sec-ch-ua-mobile' => '?0',
					'sec-ch-ua-platform' => '"Windows"',
					'sec-ch-ua-platform-version' => '"19.0.0"',
					'sec-ch-ua-full-version-list' => '"Not(A:Brand";v="99.0.0.0", "Google Chrome";v="133.0.6943.142", "Chromium";v="133.0.6943.142"',
					'device-memory' => '8',
					'ect' => '4g'
				],
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'ram' => 8192,
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '19.0.0',
				'engine' => 'Blink',
				'engineversion' => '133.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '133.0.6943.142',
				'browserreleased' => '2025-02-26',
				'nettype' => '4g'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals(\array_diff_key($item, ['hints' => '']), lib::parse($ua, $item['hints']), $ua);
		}
	}
}