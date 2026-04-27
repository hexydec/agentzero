<?php
declare(strict_types = 1);

final class clientHintsTest extends \PHPUnit\Framework\TestCase {

	public function testClientHints() : void {
		$ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36';
		$strings = [
			// Windows — platform-version index 19 has no mapping, so the raw hint value is used as-is
			[$ua, [
				'hints' => [
					'sec-ch-ua-mobile' => '?0',
					'sec-ch-ua-platform' => '"Windows"',
					'sec-ch-ua-platform-version' => '"19.0.0"',
					'sec-ch-ua-full-version-list' => '"Not(A:Brand";v="99.0.0.0", "Google Chrome";v="133.0.6943.142", "Chromium";v="133.0.6943.142"',
					'device-memory' => '8',
					'ect' => '4g'
				],
				'string' => $ua,
				'type' => 'human',
				'category' => 'desktop',
				'ram' => 8192,
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '11',
				'engine' => 'Blink',
				'engineversion' => '133.0.6943.142',
				'browser' => 'Chrome',
				'browserversion' => '133.0.6943.142',
				'browserreleased' => '2025-02-25',
				'nettype' => '4g'
			]],
			// Windows 10 first release — platform-version index 1 maps to '10.1507'
			[$ua, [
				'hints' => [
					'sec-ch-ua-mobile' => '?0',
					'sec-ch-ua-platform' => '"Windows"',
					'sec-ch-ua-platform-version' => '"1.0.0"',
					'sec-ch-ua-full-version-list' => '"Not(A:Brand";v="99.0.0.0", "Google Chrome";v="133.0.6943.142", "Chromium";v="133.0.6943.142"',
					'device-memory' => '8',
					'ect' => '4g'
				],
				'string' => $ua,
				'type' => 'human',
				'category' => 'desktop',
				'ram' => 8192,
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10.1507',
				'engine' => 'Blink',
				'engineversion' => '133.0.6943.142',
				'browser' => 'Chrome',
				'browserversion' => '133.0.6943.142',
				'browserreleased' => '2025-02-25',
				'nettype' => '4g'
			]],
		];
		foreach ($strings AS [$ua, $item]) {
			$this->assertEquals(\array_diff_key($item, ['hints' => '']), lib::parse($ua, $item['hints']), $ua);
		}
	}

	public function testMobileHint() : void {
		// A desktop UA with the mobile hint set to ?1 should report as mobile
		$ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36';
		$result = lib::parse($ua, ['sec-ch-ua-mobile' => '?1']);
		$this->assertSame('mobile', $result['category'], 'sec-ch-ua-mobile ?1 should override category to mobile');
	}

	public function testDeviceMemoryConversion() : void {
		// Device memory is a float (GB) and should be converted to MB as an integer
		$ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36';
		$cases = [
			['0.25', 256],
			['0.5', 512],
			['1', 1024],
			['4', 4096],
		];
		foreach ($cases AS [$input, $expected]) {
			$result = lib::parse($ua, ['device-memory' => $input]);
			$this->assertSame($expected, $result['ram'], "device-memory '$input' should produce ram $expected MB");
		}
	}

	public function testHintValueTooLong() : void {
		// Hint values over 500 bytes must be silently ignored
		$ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36';
		$result = lib::parse($ua, ['ect' => \str_repeat('x', 501)]);
		$this->assertArrayNotHasKey('nettype', $result, 'Hint values over 500 bytes should be ignored');
	}
}