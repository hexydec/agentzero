<?php
use hexydec\agentzero\agentzero;

final class appsTest extends \PHPUnit\Framework\TestCase {

	public function testApps() : void {
		$strings = [
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaSearchBrowser/23.51.1 BroPP/1.0 YaSearchApp/23.51.1 webOmni SA/3 Mobile Safari/537.36' => [
				'type' => 'human',
				'category' => 'mobile',
				'device' => 'M2006C3MNG',
				'architecture' => 'arm',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '112.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '112.0.0.0',
				'app' => 'Yandex',
				'appversion' => '23.51.1'
			],
			'Mozilla/5.0 (Linux; arm; Android 10; M2006C3MNG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 YaApp_Android/23.12.1 YaSearchBrowser/23.12.1 BroPP/1.0 SA/3 Mobile Safari/537.36' => [
				'type' => 'human',
				'category' => 'mobile',
				'device' => 'M2006C3MNG',
				'architecture' => 'arm',
				'bits' => 32,
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '108.0.0.0',
				'browser' => 'Chrome',
				'browserversion' => '108.0.0.0',
				'app' => 'Yandex',
				'appversion' => '23.12.1'
			],
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)' => [
				'type' => 'robot',
				'category' => 'crawler',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Linux',
				'engine' => 'Blink',
				'engineversion' => '41.0.2272.118',
				'browser' => 'Chrome',
				'browserversion' => '41.0.2272.118',
				'app' => 'Google-Read-Aloud',
				'url' => 'https://support.google.com/webmasters/answer/1061943'
			],
			'AndroidDownloadManager/11 (Linux; U; Android 11; ONEPLUS A6013 Build/RKQ1.201217.002)' => [
				'type' => 'human',
				'vendor' => 'OnePlus',
				'device' => 'A6013',
				'build' => 'RKQ1.201217.002',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '11',
				'app' => 'AndroidDownloadManager',
				'appversion' => '11'
			],
			'Mozilla/5.0 (Linux; Android 13; CPH2213 Build/TP1A.220905.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/109.0.5414.117 Mobile Safari/537.36 OcIdWebView ({"os":"Android","osVersion":"33","app":"com.google.android.gms","appVersion":"219","style":2,"isDarkTheme":true})' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'OnePlus',
				'device' => 'CPH2213',
				'build' => 'TP1A.220905.001',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '13',
				'engine' => 'Blink',
				'engineversion' => '109.0.5414.117',
				'browser' => 'Chrome',
				'browserversion' => '109.0.5414.117',
				'app' => 'Google',
				'appversion' => '219',
				'darkmode' => true
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/242.1.493995244 Mobile/15E148 Safari/604.1' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.1',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'browser' => 'Safari',
				'browserversion' => '604.1',
				'app' => 'Google',
				'appversion' => '242.1.493995244'
			],
			'Mozilla/5.0 (Linux; Android 8.0.0; SM-A520F Build/R16NW; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/109.0.5414.118 Mobile Safari/537.36 GoogleApp/14.4.6.26.arm64' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'device' => 'SM-A520F',
				'build' => 'R16NW',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '8.0.0',
				'engine' => 'Blink',
				'engineversion' => '109.0.5414.118',
				'browser' => 'Chrome',
				'browserversion' => '109.0.5414.118',
				'app' => 'Google',
				'appversion' => '14.4.6.26.arm64'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 [LinkedInApp]/9.25.1981' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.0',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'app' => 'LinkedIn'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testFacebook() : void {
		$strings = [
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/20B82 [FBAN/FBIOS;FBAV/343.1.0.53.117;FBBV/330408024;FBDV/iPhone12,1;FBMD/iPhone;FBSN/iOS;FBSV/16.1;FBSS/2;FBID/phone;FBLC/en_GB;FBOP/5;FBRV/334541633]' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '20B82',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.1',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'language' => 'en-GB',
				'app' => 'Facebook',
				'appversion' => '343.1.0.53.117'
			],
			'[FBAN/FB4A;FBAV/302.0.0.45.119;FBBV/268946150;FBDM/{density=2.55,width=1080,height=1808};FBLC/fr_FR;FBRV/270254211;FBCR/Togocel;FBMF/HUAWEI;FBBD/HUAWEI;FBPN/com.facebook.katana;FBDV/MHA-L29;FBSV/9;FBOP/1;FBCA/armeabi-v7a:armeabi;]' => [
				'type' => 'human',
				'vendor' => 'Huawei',
				'device' => 'MHA-L29',
				'architecture' => 'arm',
				'bits' => 32,
				'platform' => 'Android',
				'platformversion' => '9',
				'language' => 'fr-FR',
				'app' => 'Facebook',
				'appversion' => '302.0.0.45.119',
				'width' => 1080,
				'height' => 1808,
				'density' => 2.55
			],
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Messenger/97.11.116 Chrome/83.0.4103.122 Electron/9.1.0 Safari/537.36 MessengerDesktop [FBAN/MessengerDesktop;FBAV/97.11.116;FBBV/283083801;FBDV/high;FBSN/darwin;FBSV/10.14.6;FBSS/1;FBID/desktop;FBLC/fr_FR;FBOP/0;FBWS/0;MDBeta/0;MDMas/0]' => [
				'type' => 'human',
				'category' => 'desktop',
				'vendor' => 'Apple',
				'device' => 'Macintosh',
				'processor' => 'Intel',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'Mac OS X',
				'platformversion' => '10.14.6',
				'engine' => 'Blink',
				'engineversion' => '83.0.4103.122',
				'browser' => 'Chrome',
				'browserversion' => '83.0.4103.122',
				'language' => 'fr-FR',
				'app' => 'Facebook Messenger',
				'appversion' => '97.11.116'
			],
			'Mozilla/5.0 (Linux; Android 10; SM-G9600 Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 [FB_IAB/Orca-Android;FBAV/393.0.0.18.92;FB_FW/2;FBAN/FB4A]' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'device' => 'SM-G9600',
				'build' => 'QP1A.190711.020',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.128',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.128',
				'app' => 'Facebook',
				'appversion' => '393.0.0.18.92'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/20C65 [FBAN/FBIOS;FBDV/iPhone12,3;FBMD/iPhone;FBSN/iOS;FBSV/16.2;FBSS/3;FBID/phone;FBLC/en_Qaau_GB;FBOP/5]' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '20C65',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.2',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'language' => 'en-GB',
				'app' => 'Facebook'
			],
			'Mozilla/5.0 (Linux; Android 7.0; SM-G930F Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/116.0.0.0 Mobile Safari/537.36 SamsungBrowser/CrossApp/0.1.130' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'device' => 'SM-G930F',
				'build' => 'NRD90M',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '7.0',
				'engine' => 'Blink',
				'engineversion' => '116.0.0.0',
				'browser' => 'Samsung Browser',
				'browserversion' => '0.1.130',
				'app' => 'CrossApp',
				'appversion' => '0.1.130'
			],
			'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 CanvasFrame/1.21.6907.27509 Safari/537.36 FacebookCanvasDesktop FBAN/GamesWindowsDesktopApp FBAV/1.21.6907.27509' => [
				'type' => 'human',
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'kernel' => 'Windows NT',
				'platform' => 'Windows',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '63.0.3239.132',
				'browser' => 'Chrome',
				'browserversion' => '63.0.3239.132',
				'app' => 'Facebook Gamesroom',
				'appversion' => '1.21.6907.27509'
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testInstagram() : void {
		$strings = [
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 263.1.0.14.103 (iPhone14,2; iOS 16_1_1; zh_HK; zh-Hant-HK; scale=3.00; 1170x2532; 428326971) NW/3' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.1.1',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'language' => 'zh-HK',
				'app' => 'Instagram',
				'appversion' => '263.1.0.14.103',
				'width' => 1170,
				'height' => 2532,
				'density' => 3
			],
			'Mozilla/5.0 (Linux; Android 11; SM-N986U Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 Instagram 264.0.0.22.106 Android (30/11; 420dpi; 1080x2123; samsung; SM-N986U; c2q; qcom; en_US; 430370703)' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'device' => 'SM-N986U',
				'build' => 'RP1A.200720.012',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '11',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.128',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.128',
				'language' => 'en-US',
				'app' => 'Instagram',
				'appversion' => '264.0.0.22.106',
				'width' => 1080,
				'height' => 2123,
				'dpi' => 420
			],
			'Mozilla/5.0 (iPad; CPU OS 15_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 264.3.0.19.104 (iPad11,3; iPadOS 15_5; zh_HK; zh-Hant-HK; scale=2.00; 1334x750; 432065435) NW/3' => [
				'type' => 'human',
				'category' => 'tablet',
				'vendor' => 'Apple',
				'device' => 'iPad',
				'model' => '15E148',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '15.5',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'language' => 'zh-HK',
				'app' => 'Instagram',
				'appversion' => '264.3.0.19.104',
				'width' => 1334,
				'height' => 750,
				'density' => 2
			],
			'Mozilla/5.0 (Linux; Android 12; 2109119DG Build/SKQ1.211006.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 Instagram 264.0.0.22.106 Android (31/12; 440dpi; 1080x2166; Xiaomi; 2109119DG; lisa; qcom; zh_CN; 430370703)' => [
				'type' => 'human',
				'category' => 'mobile',
				'device' => '2109119DG',
				'build' => 'SKQ1.211006.001',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '12',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.128',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.128',
				'language' => 'zh-CN',
				'app' => 'Instagram',
				'appversion' => '264.0.0.22.106',
				'width' => 1080,
				'height' => 2166,
				'dpi' => 440
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}

	public function testTikTok() : void {
		$strings = [
			'Mozilla/5.0 (iPhone; CPU iPhone OS 15_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 musical_ly_27.4.0 JsSdk/2.0 NetType/WIFI Channel/App Store ByteLocale/en Region/NL ByteFullLocale/en isDarkMode/0 WKWebView/1 BytedanceWebview/d8a21c6 FalconTag/0DBF259D-DD6F-46C4-876F-1F647F78D86E' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '15.1',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'language' => 'en',
				'app' => 'TikTok',
				'appversion' => '27.4.0',
				'nettype' => 'WIFI',
				'darkmode' => false
			],
			'musical_ly_2022706030 AppVersion/2022706030 JsSdk/2.0 NetType/WIFI Channel/googleplay ByteLocale/en Webcast_ByteLocale/en Region/NP App/musical_ly WebcastSDK/2670 Mozilla/5.0 (Linux; Android 10; M2004J19C Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/108.0.5359.128 Mobile Safari/537.36 musical_ly_2022706030 JsSdk/1.0 NetType/WIFI Channel/googleplay AppName/musical_ly app_version/27.6.3 ByteLocale/en ByteFullLocale/en Region/NP Spark/1.2.5.3-bugfix AppVersion/27.6.3 PIA/1.5.10 BytedanceWebview/d8a21c6' => [
				'type' => 'human',
				'category' => 'mobile',
				'device' => 'M2004J19C',
				'build' => 'QP1A.190711.020',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '10',
				'engine' => 'Blink',
				'engineversion' => '108.0.5359.128',
				'browser' => 'Chrome',
				'browserversion' => '108.0.5359.128',
				'language' => 'en',
				'app' => 'TikTok',
				'appversion' => '27.6.3',
				'nettype' => 'WIFI'
			],
			'Mozilla/5.0 (Linux; Android 8.1.0; vivo Y85A Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/65.0.3325.109 Mobile Safari/537.36 musical_ly_2022709410 JsSdk/1.0 NetType/4G Channel/googleplay AppName/musical_ly app_version/27.9.41 ByteLocale/en ByteFullLocale/en Region/PK Spark/1.2.6.1-bugfix AppVersion/27.9.41 PIA/1.5.11 BytedanceWebview/d8a21c6' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Vivo',
				'device' => 'Y85A',
				'build' => 'OPM1.171019.011',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '8.1.0',
				'engine' => 'Blink',
				'engineversion' => '65.0.3325.109',
				'browser' => 'Chrome',
				'browserversion' => '65.0.3325.109',
				'language' => 'en',
				'app' => 'TikTok',
				'appversion' => '27.9.41',
				'nettype' => '4G'
			],
			'musical_ly_2022801030 AppVersion/2022801030 JsSdk/2.0 NetType/WIFI Channel/googleplay ByteLocale/en Webcast_ByteLocale/en Region/SA App/musical_ly WebcastSDK/2720 Mozilla/5.0 (Linux; Android 13; SM-A725F Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/109.0.5414.118 Mobile Safari/537.36 musical_ly_2022801030 JsSdk/1.0 NetType/WIFI Channel/googleplay AppName/musical_ly app_version/28.1.3 ByteLocale/en ByteFullLocale/en Region/SA Spark/1.2.6.1-bugfix AppVersion/28.1.3 PIA/1.5.11 BytedanceWebview/d8a21c6' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Samsung',
				'device' => 'SM-A725F',
				'build' => 'TP1A.220624.014',
				'kernel' => 'Linux',
				'platform' => 'Android',
				'platformversion' => '13',
				'engine' => 'Blink',
				'engineversion' => '109.0.5414.118',
				'browser' => 'Chrome',
				'browserversion' => '109.0.5414.118',
				'language' => 'en',
				'app' => 'TikTok',
				'appversion' => '28.1.3',
				'nettype' => 'WIFI'
			],
			'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 BytedanceWebview/d8a21c6 musical_ly_27.9.0 JsSdk/2.0 NetType/4G Channel/App Store ByteLocale/ar Region/EG musical_ly_27.9.0 JsSdk/2.0 NetType/MOBILE Channel/App Store AppVersion/27.9.0 AppName/musical_ly Rifle_27.9.0 musical_ly_27.9.0 JsSdk/2.0 NetType/4G Channel/App Store ByteLocale/ar Region/EG ByteFullLocale/ar  isDarkMode/0 Spark/1.2.6.2-bugfix HybridTag/EF19ACC6-C9CA-4584-AC8B-8BF5F83BD352 WKWebView/1 Bullet/1 musical_ly/27.9.0 FalconTag/1CE85414-C990-4F0F-9EE7-72B1D7ED43BE' => [
				'type' => 'human',
				'category' => 'mobile',
				'vendor' => 'Apple',
				'device' => 'iPhone',
				'model' => '15E148',
				'architecture' => 'arm',
				'bits' => 64,
				'kernel' => 'Linux',
				'platform' => 'iOS',
				'platformversion' => '16.2',
				'engine' => 'WebKit',
				'engineversion' => '605.1.15',
				'language' => 'ar',
				'app' => 'TikTok',
				'appversion' => '27.9.0',
				'nettype' => '4G',
				'darkmode' => false
			]
		];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua), fn(mixed $item) : mixed => $item !== null), $ua);
		}
	}
}