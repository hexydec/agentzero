<?php
namespace hexydec\agentzero;

class crawlers {

	public static function get() {
		$fn = function (string $value, int $i, array $tokens) : ?array {
			if (!\str_contains($value, '://')) { // bot will be in the URL
				$parts = \explode('/', $value, 2);

				// special case
				if (\strcasecmp($parts[0], 'Spider') === 0) {
					$ua = \implode(' ', $tokens);
					if (\mb_stripos($ua, 'Screaming Frog SEO Spider') === 0) {
						$parts[0] = 'Screaming Frog SEO Spider';
					} elseif (\mb_stripos($ua, 'Sogou web spider') === 0) {
						$parts[0] = 'Sogou web spider';
					}
				}

				// process version
				if (!empty($parts[1])) {
					$parts[1] = \ltrim($parts[1], 'v');
					$parts[1] = \substr($parts[1], 0, \strspn($parts[1], '0123456789.'));
				}
				$category = [
					'yacybot' => 'search',
					'Googlebot' => 'search',
					'Googlebot-Mobile' => 'search',
					'Googlebot-Image' => 'search',
					'Googlebot-Video' => 'search',
					'Googlebot-News' => 'search',
					'Storebot-Google' => 'search',
					'AdsBot-Google' => 'ads',
					'AdsBot-Google-Mobile' => 'ads',
					'Google-InspectionTool' => 'search',
					'Mediapartners-Google' => 'ads',
					'Google-Site-Verification' => 'checker',
					'GoogleOther' => 'crawler',
					'Bingbot' => 'search',
					'bingbot' => 'search',
					'adidxbot' => 'ads',
					'DuckDuckBot' => 'search',
					'Baiduspider' => 'search',
					'Applebot' => 'search',
					'YandexBot' => 'search',
					'MJ12bot' => 'search',
					'Mail.RU_Bot' => 'search',
					'HaosouSpider' => 'search',
					'360Spider' => 'search',
					'Exabot' => 'search',
					'Yahoo! Slurp' => 'search',
					'Sogou web spider' => 'search',
					'facebookexternalhit' => 'feed',
					'FeedFetcher-Google' => 'feed',
					'GoogleProducer' => 'feed',
					'CFNetwork' => 'feed',
					'SemrushBot' => 'crawler',
					'AhrefsSiteAudit' => 'crawler',
					'AhrefsBot' => 'crawler',
					'Swiftbot' => 'crawler',
					'CCBot' => 'crawler',
					'rogerbot' => 'crawler',
					'UptimeRobot' => 'monitor',
					'PetalBot' => 'search',
					'magpie-crawler' => 'crawler',
					'WebCrawler' => 'crawler',
					'OnCrawl' => 'crawler',
					'Screaming Frog SEO Spider' => 'crawler',
					'Twitterbot' => 'feed',
					'Xbot' => 'feed',
					'Discordbot' => 'feed',
					'Google Page Speed Insights' => 'checker',
					'Qwantify' => 'search',
					'Qwantify-junior' => 'search',
					'Qwantify-news' => 'search',
					'Qwantify-official' => 'search',
					'Qwantify-wikidata' => 'search',
					'Qwantify-dev' => 'search',
					'okhttp' => 'scraper',
					'python-requests' => 'scraper',
					'Python' => 'scraper',
					'python-httpx' => 'scraper',
					'Python-urllib' => 'scraper',
					'python-urllib3' => 'scraper',
					'Nessus' => 'checker',
					'curl' => 'scraper',
					'Chrome-Lighthouse' => 'checker',
					'WordPress' => 'monitor',
					'MBCrawler' => 'crawler',
					'PRTG Network Monitor (www.paessler.com)' => 'monitor',
					'PRTGCloudBot' => 'monitor',
					'Site24x7' => 'monitor',
					'Bytespider' => 'search',
					'woorankreview' => 'crawler',
					'adbeat.com/policy' => 'ads',
					'Siteimprove.com' => 'crawler',
					'PingdomTMS' => 'monitor',
					'proximic' => 'ads',
					'MicrosoftPreview' => 'feed'
				];
				return [
					'type' => 'robot',
					'category' => $category[$parts[0]] ?? null,
					'app' => $parts[0],
					'appversion' => $parts[1] ?? null
				];
			}
			return null; 
		};
		return [
			'Yahoo! Slurp' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'facebookexternalhit/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'AhrefsSiteAudit/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Google-Site-Verification/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Google-InspectionTool/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Mediapartners-Google/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'FeedFetcher-Google' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'GoogleProducer' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'CFNetwork/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Siteimprove.com' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Google Page Speed Insights' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'Qwantify' => [
				'match' => 'start',
				'categories' => $fn
			],
			'okhttp' => [
				'match' => 'start',
				'categories' => $fn
			],
			'python' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Nessus' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Chrome-Lighthouse' => [
				'match' => 'start',
				'categories' => $fn
			],
			'PingdomTMS/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Pingdom.com' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$version = \explode('_', \trim($value, '_'));
					return [
						'type' => 'robot',
						'category' => 'monitor',
						'app' => 'Pingdom.com Bot',
						'appversion' => \end($version)
					];
				}
			],
			'proximic' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'WordPress' => [
				'match' => 'start',
				'categories' => $fn
			],
			'PRTG Network Monitor (www.paessler.com)' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'Site24x7' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'woorankreview/' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'adbeat.com' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'robot',
					'category' => 'ads',
					'app' => 'Adbeat',
					'url' => $value
				]
			],
			'MicrosoftPreview/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'Siteimprove.com' => [
				'match' => 'exact',
				'categories' => $fn
			],
			'OnCrawl/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'curl/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'spider' => [
				'match' => 'any',
				'categories' => $fn
			],
			'crawler' => [
				'match' => 'any',
				'categories' => $fn
			],
			'bot' => [
				'match' => 'any',
				'categories' => $fn
			],
		];
	}
}