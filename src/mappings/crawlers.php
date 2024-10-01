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
		if (!\str_contains($value, '://') && \mb_stripos($value, 'Chrome/') !== 0 && \strcasecmp('Cubot', $value) !== 0 && \strcasecmp('Power bot', $value) !== 0) { // bot will be in the URL
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
				'iploggerbot' => 'monitor',
				'baiduspider' => 'search',
				'baiduspider+' => 'search',
				'baiduspider-image+' => 'search',
				'baiduspider-ads' => 'ads',
				'haosouspider' => 'search',
				'yisouspider' => 'search',
				'360spider' => 'search',
				'sogou web spider' => 'search',
				'bytespider' => 'crawler',
				'claudebot' => 'ai',
				'gptbot' => 'ai',
				'diffbot' => 'ai',
				'amazonbot' => 'ai',
				'applebot' => 'ai',
				'perplexitybot' => 'ai',
				'youbot' => 'ai',
				'iaskbot' => 'ai',
				'ccbot' => 'crawler',
				'wpbot' => 'ai'
			];
			$apps = [
				'googlebot' => 'Google Bot',
				'googlebot-mobile' => 'Google Bot',
				'googlebot-image' => 'Google Bot',
				'googlebot-video' => 'Google Bot',
				'googlebot-news' => 'Google Bot',
				'storebot-google' => 'Google Bot',
				'adsbot-google' => 'Google Bot',
				'google-adwords-instant' => 'Google Bot',
				'adsbot-google-mobile' => 'Google Bot',
				'mediapartners-google' => 'Google Bot',
				'google-safety' => 'Google Safety',
				'duckduckbot' => 'DuckDuck Bot',
				'duckduckbot-https' => 'DuckDuck Bot',
				'duckduckgo-favicons-bot' => 'DuckDuck Bot',
				'coccocbot-image' => 'Coccoc Bot',
				'coccocbot-web' => 'Coccoc Bot',
				'mj12bot' => 'Majestic 12 Bot',
				'exabot' => 'ExaBot',
				'twitterbot' => 'TwitterBot',
				'discordbot' => 'DiscordBot',
				'sematextsyntheticsrobot' => 'Sematext Synthetics Robot',
				'bitlybot' =>  'Bit.ly Bot',
				'webprosbot' => 'WebprosBot',
				'mediatoolkitbot' => 'MediaToolkit Bot',
				'cfnetwork' => 'Apple Core Foundation Network',
				'ncsc web check feedback.webcheck@digital.ncsc.gov.uk' => 'NCSC Web Check',
				'enhanced webcheck feedback@digital.ncsc.gov.uk' => 'NCSC Enhanced Web Check',
				'the national archives uk government web archive:' => 'UK Government National Archives',
				'google-inspectiontool' => 'Google Inspection Tool',
				'google-pagerenderer google' => 'Google Page Renderer',
				'pingdomtms' => 'Pingdom Bot',
				'facebookexternalhit' => 'Facebook URL Preview',
				'phxbot' => 'ProtonMail Bot',
				'monitoring360bot' => 'Monitoring360 Bot',
				'cloudflare-healthchecks' => 'Cloudflare Health Checks',
				'cloudflare-alwaysonline' => 'Cloudflare Always Online',
				'cloudflare-traffic-manager' => 'Cloudflare-Traffic-Manager',
				'cloudflare-prefetch' => 'Cloudflare Prefetch',
				'cloudflare-ssldetector' => 'Cloudflare SSL Detector',
				'cloudflare-diagnostics' => 'Cloudflare Diagnostics',
				'ptst' => 'Cloudflare Speed Test',
				'citoid' => 'Wikimedia Citoid',
				'user-agent: seolyt' => 'SEOlyt',
				'bytespider' => 'ByteDance Spider',
				'spider-feedback@bytedance.com' => 'ByteDance Spider',
				'oai-searchbot' => 'OpenAI SearchBot',
				'semrushbot' => 'Semrush Bot',
				'semrushbot-si' => 'Semrush Bot',
				'semrushbot-ocob' => 'Semrush Bot',
				'semrushbot-swa' => 'Semrush Bot',
				'semrushbot-ba' => 'Semrush Bot',
				'siteauditbot' => 'Semrush Bot',
				'splitsignalbot' => 'Semrush Bot',
				'linkcheck by siteimprove.com' => 'SiteImprove Crawler',
				'sitecheck-sitecrawl by siteimprove.com' => 'SiteImprove Crawler',
				'image size by siteimprove.com' => 'SiteImprove Crawler',
				'probe by siteimprove.com' => 'SiteImprove Crawler',
				'by siteimprove.com' => 'SiteImprove Crawler',
				'magpie-crawler' => 'Brandwatch Magpie Crawler',
				'linkedinbot' => 'LinkedIn Bot',
				'dotbot' => 'Moz DotBot',
				'dataforseobot' => 'DataForSeo Bot',
				'wordpress' => 'WordPress',
				'prtg network monitor' => 'Paessler PRTG Bot',
				'prtgcloudbot' => 'Paessler PRTG Bot',
				'powershell' => 'PowerShell',
				'ccbot' => 'CommonCrawl Bot',
				'oncrawl' => 'OnCrawl Bot',
				'pycurl' => 'PycURL',
				'chatgpt-user' => 'ChatGPT User',
				'mail.ru_bot' => 'Mail.ru Bot',
				'wpbot' => 'Wpbot',
				'dnbcrawler-analytics' => 'DnB Crawler Analytics',
				'baiduspider-image+' => 'Baidu Spider',
				'baiduspider-render' => 'Baidu Spider',
				'baiduspider-ads' => 'Baidu Spider',
				'amazon-kendra' => 'Amazon Bot',
				'amazon-qbusiness' => 'Amazon Bot',
				'amazon cloudfront' => 'Amazon Bot',
				'amazonbot-video' => 'Amazon Bot',
				'hubspot crawler' => 'HubSpot Crawler',
				'wordpress.com mshots' => 'WordPress.com mShots',
				'wordpress.com' => 'WordPress',
				'p3p validator' => 'P3P Validator',
				'w3c-checklink' => 'W3C Checklink',
				'w3c_validator' => 'W3C Validator'
			];
			
			$lower = \mb_strtolower($parts[0]);
			return \array_merge([
				'type' => 'robot',
				'app' => $apps[$lower] ?? self::normaliseAppname($parts[0]),
				'appname' => $parts[0],
				'appversion' => empty($parts[1]) ? null : $parts[1]
			], $data, [
				'category' => $category[$lower] ?? $data['category'] ?? (\mb_stripos($value, 'crawl') !== false || \mb_stripos($value, 'bot') !== false ? 'crawler' : 'scraper')
			]);
		}
		return [];
	}

	protected static function normaliseAppname(string $name) : string {
		$find = ['_', '-', '+', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
		$replace = [' ', ' ', '', ' A', ' B', ' C', ' D', ' E', ' F', ' G', ' H', ' I', ' J', ' K', ' L', ' M', ' N', ' O', ' P', ' Q', ' R', ' S', ' T', ' U', ' V', ' W', ' X', ' Y', ' Z'];
		$name = \trim(\str_replace($find, $replace, $name));
		$output = '';
		$single = true;
		foreach (\explode(' ', $name) AS $key => $item) {
			if ($item !== '') {
				$currsingle = \mb_strlen($item) === 1;
				$output .= ($single && ($currsingle || $key === 1) ? '' : ' ').(!$currsingle ? \ucfirst($item) : $item);
				$single = $currsingle;
			}
		}
		return \trim(\str_ireplace(['bot', 'crawler', 'spider', '  ', 'ro bot'], [' Bot', ' Crawler', ' Spider', ' ', 'Robot'], $output)); // replace afterward for where it is preceded by ACROYMN
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
			'ai' => fn (string $value) : array => self::getApp($value, ['category' => 'ai']),
			'feed' => fn (string $value) : array => self::getApp($value, \array_merge(
				\str_contains($value, 'WhatsApp/') ? [
					'app' => 'WhatsApp'
				] : [],
				[
					'category' => 'feed'
				]
			)),
			'crawler' => function (string $value) : array {
				return self::getApp($value, ['category' => 'crawler']);
			},
			'monitor' => fn (string $value) : array => self::getApp($value, ['category' => 'monitor']),
			'scraper' => fn (string $value) : array => self::getApp($value, ['category' => 'scraper']),
			'map' => fn (string $value) : array => self::getApp($value)
		];
		return [
			'Mozlila/' => new props('start', [
				'type' => 'robot',
				'categpry' => 'scraper'
			]),
			'Moblie' => new props('exact', [ // some samsung devices mispelt it
				'type' => 'robot',
				'category' => 'scraper'
			]),
			'Yahoo! Slurp' => new props('start', fn (string $value) : array => [
				'type' => 'robot',
				'category' => 'search',
				'app' => 'Yahoo! Slurp',
				'appname' => $value
			]),
			'Google-Site-Verification/' => new props('start', $fn['validator']),
			'Google-InspectionTool/' => new props('start', $fn['validator']),
			'Google-Safety' => new props('exact', $fn['validator']),
			'Google-Read-Aloud' => new props('exact', $fn['feed']),
			'Google AppsViewer' => new props('exact', $fn['feed']),
			'Mediapartners-Google' => new props('start', $fn['search']),
			'FeedFetcher-Google' => new props('exact', $fn['feed']),
			'Google-PageRenderer' => new props('start', $fn['crawler']),
			'GoogleProducer' => new props('exact', $fn['feed']),
			'Google-adstxt' => new props('exact', $fn['ads']),
			'Google-Adwords-Instant' => new props('exact', $fn['ads']),
			'CFNetwork/' => new props('start', $fn['feed']),
			'Siteimprove.com' => new props('any', $fn['crawler']),
			'SEOlyt/' => new props('any', $fn['crawler']),
			'CyotekWebCopy' => new props('start', $fn['scraper']),
			'Yandex' => new props('start', function (string $value) : array {
				$parts = \explode('/', $value, 3);
				return [
					'type' => 'robot',
					'category' => 'search',
					'app' => 'Yandex Bot',
					'appname' => $parts[0],
					'appversion' => $parts[1] ?? null
				];
			}),
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
			'amazon-kendra' => new props('exact', $fn['crawler']),
			'amazon-QBusiness' => new props('exact', $fn['ai']),
			'amazon CloudFront' => new props('exact', $fn['validator']),
			'Amazonbot-Video/' => new props('start', $fn['crawler']),
			'okhttp' => new props('start', $fn['scraper']),
			'python' => new props('start', $fn['scraper']),
			'grpc-python/' => new props('start', $fn['scraper']),
			'LWP::Simple/' => new props('start', $fn['scraper']),
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
			'Web Measure/' => new props('start', $fn['crawler']),
			'PingdomTMS/' => new props('start', $fn['monitor']),
			'DynGate' => new props('exact', $fn['monitor']),
			'CensysInspect/' => new props('start', $fn['monitor']),
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
			'Enhanced WebCheck feedback@digital.ncsc.gov.uk' => new props('exact', $fn['monitor']),
			'Pingdom.com' => new props('start', function (string $value) : array {
				$version = \explode('_', \trim($value, '_'));
				return [
					'type' => 'robot',
					'category' => 'monitor',
					'app' => 'Pingdom Bot',
					'appname' => \trim($value, '_'),
					'appversion' => \end($version)
				];
			}),
			'proximic' => new props('exact', $fn['ads']),
			'WordPress' => new props('start', $fn['feed']),
			'PRTG Network Monitor' => new props('exact', $fn['monitor']),
			'PRTGCloudBot/' => new props('start', $fn['monitor']),
			'Site24x7' => new props('exact', $fn['monitor']),
			'StatusCake' => new props('exact', $fn['monitor']),
			'AWS Network Health' => new props('start', $fn['monitor']),
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
			'Embedly/' => new props('start', $fn['feed']),
			'PayPal IPN' => new props('exact', $fn['feed']),
			'DropboxPreviewBot/' => new props('start', $fn['feed']),
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
			'OutlookMobileCloudService-Autodetect/' => new props('start', fn (string $value) : array => [
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Outlook',
				'appname' => 'OutlookMobileCloudService-Autodetect',
				'appversion' => \mb_substr($value, 37)
			]),
			'HubSpot Connect ' => new props('start', function (string $value, int $i, array $tokens) : array {
				$app = 'HubSpot Connect';
				$count = \count($tokens);
				for ($n = $i; $n < $count; $n++) {
					if (\str_starts_with($tokens[$n], 'namespace: ')) {
						$app = \mb_substr($tokens[$n], 11).' - '.$tokens[$n+1];
						break;
					}
				}
				return [
					'type' => 'robot',
					'category' => 'feed',
					'app' => 'HubSpot Connect',
					'appname' => $app,
					'appversion' => \mb_substr($value, 16)
				];
			}),
			'Pro-Sitemaps/' => new props('start', $fn['crawler']),
			'Pandalytics/' => new props('start', $fn['crawler']),
			'omgili/' => new props('start', $fn['crawler']),
			// 'CCBot/' => new props('start', $fn['crawler']),
			'The National Archives UK Government Web Archive' => new props('start', $fn['crawler']),
			'Citoid' => new props('exact', $fn['crawler']),
			'trendictionbot' => new props('start', fn (string $value) : array => [
				'type' => 'robot',
				'category' => 'crawler',
				'app' => 'Trendicion Bot',
				'appname' => 'trendictionbot',
				'appversion' => \mb_substr($value, 14)
			]),
			'Chrome Privacy Preserving Prefetch Proxy' => new props('exact', $fn['feed']),
			'ViberUrlDownloader' => new props('exact', $fn['feed']),
			'GoogleDocs' => new props('exact', fn (string $value, int $i, array $tokens) : array => [
				'type' => 'robot',
				'category' => 'feed',
				'app' => 'Google Docs',
				'appname' => $value.'; '.$tokens[$i+1]
			]),
			'Google-Lens' => new props('exact', $fn['feed']),
			'ManicTime/' => new props('start', $fn['feed']),
			'Yik Yak/' => new props('start', $fn['feed']),
			'HubSpot-Link-Resolver' => new props('exact', $fn['feed']),
			'AppleExchangeWebServices/' => new props('start', $fn['feed']),
			'The Lounge IRC Client' => new props('exact', $fn['feed']),
			'W3C-checklink/' => new props('start', $fn['validator']),
			'CSSCheck/' => new props('start', $fn['validator']),
			'Let\'s Encrypt validation server' => new props('exact', $fn['validator']),
			'SEO-Macroscope/' => new props('start', $fn['validator']),
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
			'URL Preview' => new props('any', $fn['feed']),
			'Link Preview' => new props('any', $fn['feed']),
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
			'Datadog' => new props('start', $fn['scraper']),
			'libwww-perl/' => new props('start', $fn['scraper']),
			'http/' => new props('start', $fn['scraper']),
			'Cpanel-HTTP-Client/' => new props('start', $fn['scraper']),
			'http-client/' => new props('any', $fn['scraper']),
			'HttpClient/' => new props('any', $fn['scraper']),
			'PowerShell/' => new props('start', $fn['scraper']),
			'OAI-SearchBot/' => new props('start', $fn['search']),
			'Google-Extended' => new props('start', $fn['ai']),
			'ChatGPT-User/' => new props('start', $fn['ai']),
			'facebookexternalhit/' => new props('start', $fn['feed']),
			'facebookcatalog/' => new props('start', $fn['feed']),
			'Validator' => new props('any', $fn['validator']),
			'feed' => new props('any', $fn['feed']),
			'bot/' => new props('any', $fn['map']),
			'bot-' => new props('any', $fn['map']),
			' bot ' => new props('any', $fn['map']),
			'bot' => new props('end', $fn['map']),
			'spider' => new props('any', $fn['crawler']),
			'crawler' => new props('any', $fn['map']),
		];
	}
}