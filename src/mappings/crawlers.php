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
		if (!\str_contains($value, '://') && !\str_starts_with($value, 'Chrome/')) { // bot will be in the URL
			$parts = \explode('/', $value, 2);

			// process version
			if (!empty($parts[1])) {
				$parts[1] = \ltrim($parts[1], 'v');
				$parts[1] = \substr($parts[1], 0, \strspn($parts[1], '0123456789.'));
			}
			return \array_merge([
				'type' => 'robot',
				'app' => $parts[0],
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
			'map' => function (string $value) : ?array {
				if (!\str_contains($value, '://') && \strcasecmp('Cubot', $value) !== 0 && \strcasecmp('Power bot', $value) !== 0) { // bot will be in the URL
					$parts = \explode('/', $value, 2);
					$category = [
						'yacybot' => [
							'category' => 'search',
							'app' => 'YacyBot'
						],
						'Googlebot' => [
							'category' => 'search',
							'app' => 'GoogleBot'
						],
						'Googlebot-Mobile' => [
							'category' => 'search',
							'app' => 'GoogleBot'
						],
						'Googlebot-Image' => [
							'category' => 'search',
							'app' => 'GoogleBot'
						],
						'Googlebot-Video' => [
							'category' => 'search',
							'app' => 'GoogleBot'
						],
						'Googlebot-News' => [
							'category' => 'search',
							'app' => 'GoogleBot'
						],
						'Storebot-Google' => [
							'category' => 'search',
							'app' => 'GoogleBot'
						],
						'AdsBot-Google' => [
							'category' => 'ads',
							'app' => 'GoogleBot'
						],
						'AdsBot-Google-Mobile' => [
							'category' => 'ads',
							'app' => 'GoogleBot'
						],
						'Bingbot' => [
							'category' => 'search',
							'app' => 'BingBot'
						],
						'bingbot' => [
							'category' => 'search',
							'app' => 'BingBot'
						],
						'adidxbot' => [
							'category' => 'ads',
							'app' => 'AdidxBot'
						],
						'DuckDuckBot' => [
							'category' => 'search',
							'app' => 'DuckDuckBot'
						],
						'DuckDuckGo-Favicons-Bot' => [
							'category' => 'search',
							'app' => 'DuckDuckBot'
						],
						'coccocbot-image' => [
							'category' => 'search',
							'app' => 'CoccocBot'
						],
						'coccocbot-web' => [
							'category' => 'search',
							'app' => 'CoccocBot'
						],
						'Applebot' => [
							'category' => 'search',
							'app' => 'AppleBot'
						],
						'YandexBot' => [
							'category' => 'search'
						],
						'MJ12bot' => [
							'category' => 'search',
							'app' => 'MJ12 Bot'
						],
						'Mail.RU_Bot' => [
							'category' => 'search',
							'app' => 'Mail.ru Bot'
						],
						'Exabot' => [
							'category' => 'search',
							'app' => 'ExaBot'
						],
						'UptimeRobot' => [
							'category' => 'monitor'
						],
						'PetalBot' => [
							'category' => 'search'
						],
						'Twitterbot' => [
							'category' => 'feed',
							'app' => 'TwitterBot'
						],
						'Xbot' => [
							'category' => 'feed'
						],
						'Discordbot' => [
							'category' => 'feed',
							'app' => 'DiscordBot'
						],
						'SematextSyntheticsRobot' => [
							'category' => 'monitor',
							'app' => 'Sematext Synthetics Robot'
						],
						'LinkedInBot' => [
							'category' => 'feed'
						],
						'PaperLiBot' => [
							'category' => 'feed'
						],
						'bitlybot' => [
							'category' => 'feed',
							'app' => 'Bit.ly Bot'
						],
						'TinEye-bot' => [
							'category' => 'search',
							'app' => 'TinEye Bot'
						],
						'Pinterestbot' => [
							'category' => 'feed',
							'app' => 'PinterestBot'
						],
						'WebCrawler' => [
							'category' => 'crawler'
						],
						'webprosbot' => [
							'category' => 'crawler',
							'app' => 'WebprosBot'
						],
						'GuzzleHttp' => [
							'category' => 'scraper'
						],
						'TelegramBot' => [
							'category' => 'feed'
						],
						'Ruby' => [
							'category' => 'scraper'
						],
						'SEMrushBot' => [
							'category' => 'crawler'
						],
						'Mediatoolkitbot' => [
							'category' => 'crawler',
							'app' => 'MediaToolkitBot'
						],
						'IPLoggerBot' => [
							'category' => 'monitor'
						],
						'CFNetwork' => [
							'category' => 'feed',
							'app' => 'Apple Core Foundation Network'
						],
						'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk' => [
							'category' => 'monitor',
							'app' => 'NCSC Web Check'
						],
						'Google-Site-Verification' => [
							'category' => 'validator',
							'app' => 'Google Site Verification'
						],
						'Google-InspectionTool' => [
							'category' => 'validator',
							'app' => 'Google Inspection Tool'
						],
						'PingdomTMS' => [
							'category' => 'monitor',
							'app' => 'Pingdom.com'
						],
						'facebookexternalhit' => [
							'category' => 'feed',
							'app' => 'Facebook URL Preview'
						]
					];
					return self::getApp($value, \array_merge([
						'category' => \mb_stripos($value, 'crawler') !== false ? 'crawler' : null,
						'app' => $parts[0],
						'appname' => $parts[0],
					], $category[$parts[0]] ?? []));
				}
				return null;
			}
		];
		return [
			'Yahoo! Slurp' => new props('exact', $fn['search']),
			'facebookexternalhit/' => new props('start', $fn['map']),
			'Google-Site-Verification/' => new props('start', $fn['map']),
			'Google-InspectionTool/' => new props('start', $fn['map']),
			'Mediapartners-Google' => new props('start', $fn['search']),
			'FeedFetcher-Google' => new props('exact', $fn['feed']),
			'GoogleProducer' => new props('exact', $fn['feed']),
			'Google-adstxt' => new props('exact', $fn['ads']),
			'CFNetwork/' => new props('start', $fn['map']),
			'Siteimprove.com' => new props('any', $fn['crawler']),
			'CyotekWebCopy' => new props('start', $fn['scraper']),
			'Google Page Speed Insights' => new props('exact', $fn['validator']),
			'Qwantify' => new props('start', $fn['search']),
			'okhttp' => new props('start', $fn['scraper']),
			'python' => new props('start', $fn['scraper']),
			'jsdom/' => new props('start', $fn['scraper']),
			'Nessus' => new props('start', $fn['monitor']),
			'Chrome-Lighthouse' => new props('start', $fn['validator']),
			'Siege/' => new props('start', $fn['validator']),
			'PingdomTMS/' => new props('start', $fn['map']),
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
			'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk' => new props('exact', $fn['map']),
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
			'Let\'s Encrypt validation server' => new props('exact', $fn['validator']),
			'Expanse' => new props('start', $fn['crawler']),
			'Apache-HttpClient/' => new props('start', $fn['scraper']),
			'eCairn-Grabber/' => new props('start', $fn['scraper']),
			'SEOkicks' => new props('exact', $fn['crawler']),
			'PostmanRuntime/' => new props('start', $fn['scraper']),
			'axios/' => new props('start', $fn['scraper']),
			'Rogerbot/' => new props('start', $fn['crawler']),
			'Go-http-client/' => new props('start', $fn['scraper']),
			'DashLinkPreviews/' => new props('start', $fn['feed']),
			'PycURL/' => new props('start', $fn['scraper']),
			'lua-resty-http/' => new props('start', $fn['scraper']),
			'Snapchat/' => new props('start', $fn['feed']),
			'HTTPClient/' => new props('start', $fn['scraper']),
			'WhatsApp/' => new props('any', $fn['feed']),
			'Hootsuite-Authoring/' => new props('start', $fn['feed']),
			'Snap URL Preview Service' => new props('exact', $fn['feed']),
			'ApacheBench/' => new props('start', $fn['validator']),
			'Asana/' => new props('start', $fn['feed']),
			'Java/' => new props('start', $fn['scraper']),
			'curl/' => new props('start', $fn['scraper']),
			'Wget/' => new props('start', $fn['scraper']),
			'rest-client/' => new props('start', $fn['scraper']),
			'ruby/' => new props('start', $fn['scraper']),
			'libcurl/' => new props('start', $fn['scraper']),
			'Bun/' => new props('start', $fn['scraper']),
			'CakePHP' => new props('start', $fn['scraper']),
			'cpp-httplib/' => new props('start', $fn['scraper']),
			'Dart/' => new props('start', $fn['scraper']),
			'Deno/' => new props('start', $fn['scraper']),
			'libwww-perl/' => new props('start', $fn['scraper']),
			'GuzzleHttp/' => new props('start', $fn['scraper']),
			'Cpanel-HTTP-Client/' => new props('start', $fn['scraper']),
			'akka-http/' => new props('start', $fn['scraper']),
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