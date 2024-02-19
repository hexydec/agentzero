<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class crawlers {

	/**
	 * Extracts application and version information from a token
	 * 
	 * @param string $value The token to be processed
	 * @param array<string|null> $data An array containing existing data to merge
	 * @return array<string|int|float|null> The $data array with the processed application and version added
	 */
	public static function getApp(string $value, array $data = []) : array {
		if (!\str_contains($value, '://') && !\str_starts_with($value, 'Chrome/') && \strcasecmp('Cubot', $value) !== 0 && \strcasecmp('Power bot', $value) !== 0) { // bot will be in the URL
			$parts = \explode('/', $value, 2);

			// process version
			if (!empty($parts[1])) {
				$parts[1] = \ltrim($parts[1], 'v');
				$parts[1] = \substr($parts[1], 0, \strspn($parts[1], '0123456789.'));
			}
			$category = [
				'yacybot' => 'search',
				'googlebot' => 'search',
				'googlebot-mobile' => 'search',
				'googlebot-image' => 'search',
				'googlebot-video' => 'search',
				'googlebot-news' => 'search',
				'storebot-google' => 'search',
				'adsbot-google' => 'ads',
				'adsbot-google-mobile' => 'ads',
				'mediapartners-google' => 'ads',
				'bingbot' => 'search',
				'adidxbot' => 'ads',
				'duckduckbot' => 'search',
				'duckduckgo-favicons-bot' => 'search',
				'coccocbot-image' => 'search',
				'coccocbot-web' => 'search',
				'applebot' => 'search',
				'yandexbot' => 'search',
				'mj12bot' => 'search',
				'mail.ru_bot' => 'search',
				'exabot' => 'search',
				'uptimerobot' => 'monitor',
				'petalbot' => 'search',
				'twitterbot' => 'feed',
				'xbot' => 'feed',
				'discordbot' => 'feed',
				'sematextsyntheticsrobot' => 'monitor',
				'linkedinbot' => 'feed',
				'paperlibot' => 'feed',
				'bitlybot' => 'feed',
				'tineye-bot' => 'search',
				'pinterestbot' => 'feed',
				'webcrawler' => 'crawler',
				'webprosbot' => 'crawler',
				'guzzlehttp' => 'scraper',
				'telegrambot' => 'feed',
				'semrushbot' => 'crawler',
				'mediatoolkitbot' => 'crawler',
				'iploggerbot' => 'monitor'
			];
			$apps = [
				'yacybot' => 'YacyBot',
				'googlebot' => 'GoogleBot',
				'googlebot-mobile' => 'GoogleBot',
				'googlebot-image' => 'GoogleBot',
				'googlebot-video' => 'GoogleBot',
				'googlebot-news' => 'GoogleBot',
				'storebot-google' => 'GoogleBot',
				'adsbot-google' => 'GoogleBot',
				'adsbot-google-mobile' => 'GoogleBot',
				'mediapartners-google' => 'GoogleBot',
				'bingbot' => 'BingBot',
				'adidxbot' => 'AdidxBot',
				'duckduckbot' => 'DuckDuckBot',
				'duckduckgo-favicons-bot' => 'DuckDuckBot',
				'coccocbot-image' => 'CoccocBot',
				'coccocbot-web' => 'CoccocBot',
				'applebot' => 'AppleBot',
				'mj12bot' => 'Majestic 12 Bot',
				'mail.ru_bot' => 'Mail.ru Bot',
				'exabot' => 'ExaBot',
				'twitterbot' => 'TwitterBot',
				'discordbot' => 'DiscordBot',
				'sematextsyntheticsrobot' => 'Sematext Synthetics Robot',
				'bitlybot' =>  'Bit.ly Bot',
				'tineye-bot' => 'TinEye Bot',
				'pinterestbot' => 'PinterestBot',
				'webprosbot' => 'WebprosBot',
				'mediatoolkitbot' => 'MediaToolkitBot',
				'cfnetwork' => 'Apple Core Foundation Network',
				'ncsc web check feedback.webcheck@digital.ncsc.gov.uk' => 'NCSC Web Check',
				'google-site-verification' => 'Google Site Verification',
				'google-inspectiontool' => 'Google Inspection Tool',
				'pingdomtms' => 'Pingdom.com',
				'facebookexternalhit' => 'Facebook URL Preview',
				'phxbot' => 'ProtonMail Bot',
				'baiduspider' => 'Baidu Spider',
				'yisouspider' => 'Yisou Spider',
				'google-read-aloud' => 'Google Read Aloud',
				'monitoring360bot' => '360 Monitoring',
				'cloudflare-healthchecks' => 'Cloudflare Health Checks',
				'cloudflare-alwaysonline' => 'Cloudflare Always Online',
				'cloudflare-traffic-manager' => 'Cloudflare-Traffic-Manager',
				'cloudflare-prefetch' => 'Cloudflare Prefetch',
				'cloudflare-ssldetector' => 'Cloudflare SSL Detector',
				'cloudflare-diagnostics' => 'Cloudflare Diagnostics',
				'ptst' => 'Cloudflare Speed Test'
			];
			
			$lower = \mb_strtolower($parts[0]);
			return \array_merge([
				'type' => 'robot',
				'category' => $category[$lower] ?? (\mb_stripos($value, 'crawl') !== false || \mb_stripos($value, 'bot') !== false ? 'crawler' : 'scraper'),
				'app' => $apps[$lower] ?? $parts[0],
				'appname' => $parts[0],
				'appversion' => empty($parts[1]) ? null : $parts[1]
			], $data);
		}
		return [];
	}

	/**
	 * Generates a configuration array for matching crawlers
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		$fn = [
			'search' => fn (string $value) : array => self::getApp($value, ['category' => 'search']),
			'ads' => fn (string $value) : array => self::getApp($value, ['category' => 'ads']),
			'validator' => fn (string $value) : array => self::getApp($value, ['category' => 'validator']),
			'feed' => fn (string $value) : array => self::getApp($value, \array_merge(
				\str_contains($value, 'WhatsApp/') ? [
					'app' => 'WhatsApp'
				] : [],
				[
					'category' => 'feed'
				]
			)),
			'crawler' => function (string $value) : array {
				$parts = \explode('/', $value, 2);
				$map = [
					'baiduspider' => 'search',
					'haosouspider' => 'search',
					'yisouspider' => 'search',
					'360spider' => 'search',
					'sogou web spider' => 'search',
					'bytespider' => 'search',
				];
				return self::getApp($value, [
					'category' => $map[\mb_strtolower($parts[0])] ?? 'crawler'
				]);
			},
			'monitor' => fn (string $value) : array => self::getApp($value, ['category' => 'monitor']),
			'scraper' => fn (string $value) : array => self::getApp($value, ['category' => 'scraper']),
			'map' => fn (string $value) : ?array => self::getApp($value)
		];
		return [
			'Yahoo! Slurp' => new props('exact', $fn['search']),
			'facebookexternalhit/' => new props('start', $fn['feed']),
			'Google-Site-Verification/' => new props('start', $fn['validator']),
			'Google-InspectionTool/' => new props('start', $fn['validator']),
			'Google-Read-Aloud' => new props('exact', $fn['feed']),
			'Mediapartners-Google' => new props('start', $fn['search']),
			'FeedFetcher-Google' => new props('exact', $fn['feed']),
			'GoogleProducer' => new props('exact', $fn['feed']),
			'Google-adstxt' => new props('exact', $fn['ads']),
			'CFNetwork/' => new props('start', $fn['feed']),
			'Siteimprove.com' => new props('any', $fn['crawler']),
			'CyotekWebCopy' => new props('start', $fn['scraper']),
			'Google Page Speed Insights' => new props('exact', $fn['validator']),
			'Qwantify' => new props('start', function (string $value) : array {
				$parts = \explode('/', $value, 3);
				return [
					'type' => 'robot',
					'category' => 'search',
					'app' => 'Qwant Web Crawler',
					'appname' => $parts[0],
					'appversion' => $parts[1] ?? null
				];
			}),
			'okhttp' => new props('start', $fn['scraper']),
			'python' => new props('start', $fn['scraper']),
			'jsdom/' => new props('start', $fn['scraper']),
			'Nessus' => new props('start', $fn['monitor']),
			'monitoring360bot' => new props('start', $fn['monitor']),
			'Cloudflare' => new props('start', $fn['validator']),
			'PTST/' => new props('start', $fn['validator']),
			'+https://developers.cloudflare.com/security-center/' => new props('exact', $fn['monitor']),
			'AppSignalBot/' => new props('start', $fn['monitor']),
			'Better Uptime Bot' => new props('start', [
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Better Uptime Bot',
				'appname' => 'Better Uptime Bot'
			]),
			'Chrome-Lighthouse' => new props('start', $fn['validator']),
			'Siege/' => new props('start', $fn['validator']),
			'Microsoft Profiling/' => new props('any', $fn['validator']),
			'Bidtellect' => new props('start', $fn['crawler']),
			'magpie-crawler/' => new props('start', $fn['crawler']),
			'PingdomTMS/' => new props('start', $fn['monitor']),
			'DynGate' => new props('exact', $fn['monitor']),
			'Datadog/Synthetics' => new props('exact', [
				'type' => 'robot',
				'category' => 'monitor',
				'app' => 'Datadog/Synthetics'
			]),
			'RuxitSynthetic/' => new props('start', $fn['monitor']),
			'Checkly/' => new props('start', $fn['monitor']),
			'Uptime/' => new props('start', $fn['monitor']),
			'HostTracker/' => new props('start', $fn['monitor']),
			'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk' => new props('exact', $fn['monitor']),
			'Pingdom.com' => new props('start', function (string $value) : array {
				$version = \explode('_', \trim($value, '_'));
				return [
					'type' => 'robot',
					'category' => 'monitor',
					'app' => 'Pingdom.com',
					'appname' => \trim($value, '_'),
					'appversion' => \end($version)
				];
			}),
			'proximic' => new props('exact', $fn['ads']),
			'WordPress' => new props('start', $fn['monitor']),
			'PRTG Network Monitor' => new props('exact', $fn['monitor']),
			'PRTGCloudBot/' => new props('start', $fn['monitor']),
			'Site24x7' => new props('exact', $fn['monitor']),
			'StatusCake' => new props('exact', $fn['monitor']),
			'adbeat.com' => new props('start', fn (string $value) : array => [
				'type' => 'robot',
				'category' => 'ads',
				'app' => 'Adbeat',
				'appname' => 'Adbeat',
				'url' => 'https://'.$value
			]),
			'MicrosoftPreview/' => new props('start', $fn['feed']),
			'YahooMailProxy' => new props('exact', $fn['feed']),
			'PhxBot/' => new props('start', $fn['feed']), // proton mail
			'Pleroma' => new props('start', fn (string $value) : array => [ // mastodon
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Mastodon',
				'appname' => 'Pleroma',
				'appversion' => \mb_substr($value, 8)
			]),
			'Outlook-Android/' => new props('start', fn (string $value) : array => [ // mastodon
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Outlook',
				'appname' => 'Outlook-Android',
				'platform' => 'Android',
				'appversion' => \mb_substr($value, 16)
			]),
			'Outlook-iOS/' => new props('start', fn (string $value, int $i, array $tokens) : array => [ // mastodon
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Outlook',
				'appname' => 'Outlook-iOS',
				'platform' => 'iOS',
				'appversion' => $tokens[$i+1] ?? \mb_substr($value, 12)
			]),
			'OutlookMobileCloudService-Autodetect/' => new props('start', fn (string $value) : array => [ // mastodon
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Outlook',
				'appname' => 'OutlookMobileCloudService-Autodetect',
				'appversion' => \mb_substr($value, 37)
			]),
			'Pro-Sitemaps/' => new props('start', $fn['crawler']),
			'Chrome Privacy Preserving Prefetch Proxy' => new props('exact', $fn['feed']),
			'ViberUrlDownloader' => new props('exact', $fn['feed']),
			'Google-Lens' => new props('exact', $fn['feed']),
			'ManicTime/' => new props('start', $fn['feed']),
			'Yik Yak/' => new props('start', $fn['feed']),
			'HubSpot-Link-Resolver' => new props('exact', $fn['feed']),
			'AppleExchangeWebServices/' => new props('start', $fn['feed']),
			'W3C-checklink/' => new props('start', $fn['validator']),
			'CSSCheck/' => new props('start', $fn['validator']),
			'Let\'s Encrypt validation server' => new props('exact', $fn['validator']),
			'SEO-Macroscope/' => new props('exact', $fn['validator']),
			'Electronic Frontier Foundation\'s Do Not Track Verifier' => new props('exact', $fn['validator']),
			'Expanse' => new props('start', $fn['crawler']),
			'eCairn-Grabber/' => new props('start', $fn['scraper']),
			'SEOkicks' => new props('exact', $fn['crawler']),
			'PostmanRuntime/' => new props('start', $fn['scraper']),
			'axios/' => new props('start', $fn['scraper']),
			'Rogerbot/' => new props('start', $fn['crawler']),
			'DashLinkPreviews/' => new props('start', $fn['feed']),
			'Snapchat/' => new props('start', $fn['feed']),
			'HTTPClient/' => new props('start', $fn['scraper']),
			'WhatsApp/' => new props('any', $fn['feed']),
			'Hootsuite-Authoring/' => new props('start', $fn['feed']),
			'Snap URL Preview Service' => new props('exact', $fn['feed']),
			'ApacheBench/' => new props('start', $fn['validator']),
			'Asana/' => new props('start', $fn['feed']),
			'Java/' => new props('start', $fn['scraper']),
			'curl/' => new props('any', $fn['scraper']),
			'Wget/' => new props('start', $fn['scraper']),
			'rest-client/' => new props('start', $fn['scraper']),
			'ruby/' => new props('start', $fn['scraper']),
			'Bun/' => new props('start', $fn['scraper']),
			'CakePHP' => new props('start', $fn['scraper']),
			'cpp-httplib/' => new props('start', $fn['scraper']),
			'Dart/' => new props('start', $fn['scraper']),
			'Deno/' => new props('start', $fn['scraper']),
			'libwww-perl/' => new props('start', $fn['scraper']),
			'http/' => new props('start', $fn['scraper']),
			'Cpanel-HTTP-Client/' => new props('start', $fn['scraper']),
			'http-client/' => new props('any', $fn['scraper']),
			'HttpClient/' => new props('any', $fn['scraper']),
			'PowerShell/' => new props('start', $fn['scraper']),
			'Validator' => new props('any', $fn['validator']),
			'feed' => new props('any', $fn['feed']),
			'spider' => new props('any', $fn['crawler']),
			'crawler' => new props('any', $fn['map']),
			'bot/' => new props('any', $fn['map']),
			'bot-' => new props('any', $fn['map']),
			' bot ' => new props('any', $fn['map']),
			'bot' => new props('end', $fn['map']),
		];
	}
}