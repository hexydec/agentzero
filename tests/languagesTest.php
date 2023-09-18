<?php
use hexydec\agentzero\agentzero;

final class languagesTest extends \PHPUnit\Framework\TestCase {

	public function testLanguages() : void {
		$strings = [
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 264.1.0.18.104 (iPhone12,8; iOS 16_0_2; en_HK; en-GB; scale=2.00; 750x1334; 430886483)' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.0.2',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'language' => 'en-HK',
				'app' => 'Instagram',
				'appversion' => '264.1.0.18.104',
				'width' => 750,
				'height' => 1334,
				'density' => 2
			],
			'Mozilla/5.0 (AmigaOS; U; AmigaOS 4.1; en-US; rv:89) Gecko/20100101 Firefox/89' => [
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Exec',
				'platform' => 'AmigaOS',
				'platformversion' => '4.1',
				'engine' => 'Gecko',
				'engineversion' => '89',
				'browser' => 'Firefox',
				'browserversion' => '89',
				'language' => 'en-US'
			],
			'Mozilla/5.0 (Linux; U; Android 6.0.1; en-gb; MI 3C Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.147 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.10.5-go' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Xiaomi',
				'device' => 'MI 3C',
				'build' => 'MMB29M',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '6.0.1',
				'engine' => 'Blink',
				'engineversion' => '79.0.3945.147',
				'browser' => 'Chrome',
				'browserversion' => '79.0.3945.147',
				'language' => 'en-GB'
			],
			'com.zhiliaoapp.musically/2022706030 (Linux; U; Android 10; en; TECNO KE5; Build/QP1A.190711.020; Cronet/TTNetVersion:07232c86 2022-12-15 QuicVersion:5f23035d 2022-11-23)' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Tecno',
				'device' => 'KE5',
				'build' => 'QP1A.190711.020',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'engine' => 'Blink',
				'browser' => 'Cronet',
				'browserversion' => 'TTNetVersion:07232c86',
				'language' => 'en',
				'app' => 'com.zhiliaoapp.musically',
				'appversion' => '2022706030'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}