<?php
declare(strict_types = 1);

final class frameworksTest extends \PHPUnit\Framework\TestCase {

	public function testMaui() : void {
		$strings = [
			'Opera/9.80 (MAUI Runtime; Opera Mini/4.4.33576/191.296; U; en) Presto/2.12.423 Version/12.16' => [
				'string' => 'Opera/9.80 (MAUI Runtime; Opera Mini/4.4.33576/191.296; U; en) Presto/2.12.423 Version/12.16',
				'type' => 'human',
				'platformversion' => '12.16',
				'engine' => 'Presto',
				'engineversion' => '2.12.423',
				'browser' => 'Opera Mini',
				'browserversion' => '4.4.33576/191.296',
				'language' => 'en',
				'framework' => 'MAUI',
				'browserreleased' => '2000-06-28'
			],
			'Mozilla/5.0 (Linux; Android 12; moto g play - 2023 Build/S3SGS32.39-181-5; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/116.0.0.0 Mobile Safari/537.36 Instagram 298.0.0.31.110 Android (31/12; 280dpi; 720x1439; motorola; moto g play - 2023; maui; mt6765; en_US; 510206622)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 12; moto g play - 2023 Build/S3SGS32.39-181-5; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/116.0.0.0 Mobile Safari/537.36 Instagram 298.0.0.31.110 Android (31/12; 280dpi; 720x1439; motorola; moto g play - 2023; maui; mt6765; en_US; 510206622)',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Motorola',
				'device' => 'Moto',
				'model' => 'G Play - 2023',
				'build' => 'S3SGS32.39-181-5',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '12',
				'engine' => 'Blink',
				'engineversion' => '116.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '116.0.0.0',
				'language' => 'en-US',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '298.0.0.31.110',
				'framework' => 'MAUI',
				'width' => 720,
				'height' => 1439,
				'dpi' => 280,
				'browserreleased' => '2023-09-15'
			],
			'Mozilla/5.0 (Linux; Android 12; moto g play - 2023 Build/S3SGS32.39-181-7; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/119.0.6045.193 Mobile Safari/537.36 Instagram 311.0.0.32.118 Android (31/12; 280dpi; 720x1439; motorola; moto g play - 2023; maui; mt6765; en_US; 545986890)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 12; moto g play - 2023 Build/S3SGS32.39-181-7; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/119.0.6045.193 Mobile Safari/537.36 Instagram 311.0.0.32.118 Android (31/12; 280dpi; 720x1439; motorola; moto g play - 2023; maui; mt6765; en_US; 545986890)',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Motorola',
				'device' => 'Moto',
				'model' => 'G Play - 2023',
				'build' => 'S3SGS32.39-181-7',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '12',
				'engine' => 'Blink',
				'engineversion' => '119.0.6045.193',
				'browser' => 'Chrome',
				'browserversion' => '119.0.6045.193',
				'language' => 'en-US',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '311.0.0.32.118',
				'framework' => 'MAUI',
				'width' => 720,
				'height' => 1439,
				'dpi' => 280,
				'browserreleased' => '2023-11-28'
			],
			'Mozilla/5.0 (Linux; Android 12; moto g play - 2023 Build/S3SGS32.39-181-3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Mobile Safari/537.36 Instagram 291.1.0.34.111 Android (31/12; 280dpi; 720x1439; motorola; moto g play - 2023; maui; mt6765; en_US; 494078146)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 12; moto g play - 2023 Build/S3SGS32.39-181-3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/114.0.5735.196 Mobile Safari/537.36 Instagram 291.1.0.34.111 Android (31/12; 280dpi; 720x1439; motorola; moto g play - 2023; maui; mt6765; en_US; 494078146)',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Motorola',
				'device' => 'Moto',
				'model' => 'G Play - 2023',
				'build' => 'S3SGS32.39-181-3',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '12',
				'engine' => 'Blink',
				'engineversion' => '114.0.5735.196',
				'browser' => 'Chrome',
				'browserversion' => '114.0.5735.196',
				'language' => 'en-US',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '291.1.0.34.111',
				'framework' => 'MAUI',
				'width' => 720,
				'height' => 1439,
				'dpi' => 280,
				'browserreleased' => '2023-06-26'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testElectron() : void {
		$strings = [
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5_0) AppleWebKit/537.36 (KHTML, like Gecko) Teams/1.6.00.364 Chrome/96.0.4664.174 Electron/16.2.8 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5_0) AppleWebKit/537.36 (KHTML, like Gecko) Teams/1.6.00.364 Chrome/96.0.4664.174 Electron/16.2.8 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'kernel' => 'Linux',
				'platform' => 'Mac OS X',
				'platformversion' => '12.5.0',
				'engine' => 'Blink',
				'engineversion' => '96.0.4664.174',
				'browser' => 'Chrome',
				'browserversion' => '96.0.4664.174',
				'app' => 'Teams',
				'appname' => 'Teams',
				'appversion' => '1.6.00.364',
				'framework' => 'Electron',
				'frameworkversion' => '16.2.8',
				'browserreleased' => '2021-12-13'
			],
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Teams/1.4.00.7174 Chrome/80.0.3987.163 Electron/8.5.5 Safari/537.36' => [
				'string' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Teams/1.4.00.7174 Chrome/80.0.3987.163 Electron/8.5.5 Safari/537.36',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '80.0.3987.163',
				'browser' => 'Chrome',
				'browserversion' => '80.0.3987.163',
				'app' => 'Teams',
				'appname' => 'Teams',
				'appversion' => '1.4.00.7174',
				'framework' => 'Electron',
				'frameworkversion' => '8.5.5',
				'browserreleased' => '2020-04-02'
			],
			'Mozilla/5.0 (Linux; Android 9; Allure X Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/116.0.0.0 Mobile Safari/537.36 Instagram 298.0.0.31.110 Android (28/9; 480dpi; 1080x2196; SPA Condor Electronics/Condor; Allure X; Allure_X; mt6771; fr_FR; 510206698)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; Allure X Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/116.0.0.0 Mobile Safari/537.36 Instagram 298.0.0.31.110 Android (28/9; 480dpi; 1080x2196; SPA Condor Electronics/Condor; Allure X; Allure_X; mt6771; fr_FR; 510206698)',
				'type' => 'human',
				'category' => 'mobile',
				'device' => 'Allure',
				'model' => 'X',
				'build' => 'PPR1.180610.011',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '9',
				'engine' => 'Blink',
				'engineversion' => '116.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '116.0.0.0',
				'language' => 'fr-FR',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '298.0.0.31.110',
				'width' => 1080,
				'height' => 2196,
				'dpi' => 480,
				'browserreleased' => '2023-09-15'
			],
			'Mozilla/5.0 (Linux; Android 6.0; LG-X240 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/95.0.4638.74 Mobile Safari/537.36 Instagram 278.0.0.22.117 Android (23/6.0; 320dpi; 720x1184; LG Electronics/lge; LG-X240; mlv3; mt6735; es_AR; 471827227)' => [
				'string' => 'Mozilla/5.0 (Linux; Android 6.0; LG-X240 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/95.0.4638.74 Mobile Safari/537.36 Instagram 278.0.0.22.117 Android (23/6.0; 320dpi; 720x1184; LG Electronics/lge; LG-X240; mlv3; mt6735; es_AR; 471827227)',
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'LG',
				'model' => 'X240',
				'build' => 'MRA58K',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '6.0',
				'engine' => 'Blink',
				'engineversion' => '95.0.4638.74',
				'browser' => 'Chrome',
				'browserversion' => '95.0.4638.74',
				'language' => 'es-AR',
				'app' => 'Instagram',
				'appname' => 'Instagram',
				'appversion' => '278.0.0.22.117',
				'width' => 720,
				'height' => 1184,
				'dpi' => 320,
				'browserreleased' => '2021-10-28'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testCordova() : void {
		$strings = [
			'Mozilla/5.0 (Linux; Android 5.1.1; KFAUWI Build/LVY48F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36 cordova-amazon-fireos/3.4.0 AmazonWebAppPlatform/3.4.0;2.0' => [
				'string' => 'Mozilla/5.0 (Linux; Android 5.1.1; KFAUWI Build/LVY48F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36 cordova-amazon-fireos/3.4.0 AmazonWebAppPlatform/3.4.0;2.0',
				'type' => 'human',
				'category' => 'tablet',
				'vendor' => 'Amazon',
				'device' => 'Fire Tablet',
				'model' => 'KFAUWI',
				'build' => 'LVY48F',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '5.1.1',
				'engine' => 'Blink',
				'engineversion' => '100.0.4896.127',
				'browser' => 'Chrome',
				'browserversion' => '100.0.4896.127',
				'app' => 'AmazonWebAppPlatform',
				'appname' => 'AmazonWebAppPlatform',
				'appversion' => '3.4.0',
				'framework' => 'Cordova',
				'frameworkversion' => '3.4.0',
				'browserreleased' => '2022-04-14'
			],
			'Mozilla/5.0 (Linux; Android 9; KFTRWI Build/PS7327.3326N; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.160 Mobile Safari/537.36 cordova-amazon-fireos/3.4.0 AmazonWebAppPlatform/3.4.0;2.0' => [
				'string' => 'Mozilla/5.0 (Linux; Android 9; KFTRWI Build/PS7327.3326N; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.160 Mobile Safari/537.36 cordova-amazon-fireos/3.4.0 AmazonWebAppPlatform/3.4.0;2.0',
				'type' => 'human',
				'category' => 'tablet',
				'vendor' => 'Amazon',
				'device' => 'Fire Tablet',
				'model' => 'KFTRWI',
				'build' => 'PS7327.3326N',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '9',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.160',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.160',
				'app' => 'AmazonWebAppPlatform',
				'appname' => 'AmazonWebAppPlatform',
				'appversion' => '3.4.0',
				'framework' => 'Cordova',
				'frameworkversion' => '3.4.0',
				'browserreleased' => '2023-01-10'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testNetClr() : void {
		$strings = [
			'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; TencentTraveler ; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14.52; .NET CLR 2.0.50727; InfoPath.2; .NET CLR 3.0.04506.30; .NET CLR 3.0.04506.590; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022)' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; TencentTraveler ; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14.52; .NET CLR 2.0.50727; InfoPath.2; .NET CLR 3.0.04506.30; .NET CLR 3.0.04506.590; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022)',
				'type' => 'human',
				'category' => 'desktop',
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => 'XP',
				'engine' => 'Trident',
				'browser' => 'Tencent Traveler',
				'browserversion' => '7.0',
				'app' => 'Embedded Web Browser',
				'appname' => 'EmbeddedWB',
				'appversion' => '14.52',
				'framework' => '.NET Common Language Runtime',
				'frameworkversion' => '3.5.21022',
				'url' => 'http://www.bsalsa.com/',
				'browserreleased' => '2006-10-18'
			],
			'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 769; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14.52; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0E; Alexa Toolbar; Shuame; .NET4.0C; SE 2.X MetaSr 1.0)' => [
				'string' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 769; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14.52; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2; .NET4.0E; Alexa Toolbar; Shuame; .NET4.0C; SE 2.X MetaSr 1.0)',
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '7',
				'engine' => 'Trident',
				'engineversion' => '4.0',
				'browser' => 'Internet Explorer',
				'browserversion' => '8.0',
				'app' => 'QQDownload',
				'appname' => 'QQDownload',
				'appversion' => '769',
				'framework' => '.NET Common Language Runtime',
				'frameworkversion' => '3.5.30729',
				'url' => 'http://www.bsalsa.com/',
				'browserreleased' => '2009-03-19'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}

	public function testLibwwwPerl() : void {
		$strings = [
			'W3C-checklink/4.5 [4.160] libwww-perl/5.823' => [
				'string' => 'W3C-checklink/4.5 [4.160] libwww-perl/5.823',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'W3C Checklink',
				'appname' => 'W3C-checklink',
				'appversion' => '4.5',
				'framework' => 'LibWWW Perl',
				'frameworkversion' => '5.823'
			],
			'W3C_Validator/1.305.2.12 libwww-perl/5.64' => [
				'string' => 'W3C_Validator/1.305.2.12 libwww-perl/5.64',
				'type' => 'robot',
				'category' => 'validator',
				'app' => 'W3C Validator',
				'appname' => 'W3C_Validator',
				'appversion' => '1.305.2.12',
				'framework' => 'LibWWW Perl',
				'frameworkversion' => '5.64'
			],
			'LWP::Simple/6.68 libwww-perl/6.68' => [
				'string' => 'LWP::Simple/6.68 libwww-perl/6.68',
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'LW P:: Simple',
				'appname' => 'LWP::Simple',
				'appversion' => '6.68',
				'framework' => 'LibWWW Perl',
				'frameworkversion' => '6.68'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, lib::parse($ua), $ua);
		}
	}
}