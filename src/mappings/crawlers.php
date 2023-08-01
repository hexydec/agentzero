<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class crawlers {

	public static function getApp(string $value, array $data = []) : ?array {
		if (!\str_contains($value, '://')) { // bot will be in the URL
			$parts = \explode('/', $value, 2);

			// process version
			if (!empty($parts[1])) {
				$parts[1] = \ltrim($parts[1], 'v');
				$parts[1] = \substr($parts[1], 0, \strspn($parts[1], '0123456789.'));
			}
			return \array_merge([
				'type' => 'robot',
				'app' => $parts[0],
				'appversion' => empty($parts[1]) ? null : $parts[1]
			], $data);
		}
		return null;
	}

	public static function get() {
		$map = function (string $value, array $data = []) : ?array {
			if (!\str_contains($value, '://')) { // bot will be in the URL
				$parts = \explode('/', $value, 2);

				// process version
				if (!empty($parts[1])) {
					$parts[1] = \ltrim($parts[1], 'v');
					$parts[1] = \substr($parts[1], 0, \strspn($parts[1], '0123456789.'));
				}
				return \array_merge([
					'type' => 'robot',
					'app' => $parts[0],
					'appversion' => $parts[1] ?? null
				], $data);
			}
			return null;
		};
		$fn = [
			'search' => fn (string $value, int $i, array $tokens) : ?array => $map($value, ['category' => 'search']),
			'ads' => fn (string $value, int $i, array $tokens) : ?array => $map($value, ['category' => 'ads']),
			'validator' => fn (string $value, int $i, array $tokens) : ?array => $map($value, ['category' => 'validator']),
			'feed' => fn (string $value, int $i, array $tokens) : ?array => $map($value, ['category' => 'feed']),
			'crawler' => fn (string $value, int $i, array $tokens) : ?array => $map($value, ['category' => 'crawler']),
			'monitor' => fn (string $value, int $i, array $tokens) : ?array => $map($value, ['category' => 'monitor']),
			'scraper' => fn (string $value, int $i, array $tokens) : ?array => $map($value, ['category' => 'scraper']),
			'map' => function (string $value, int $i, array $tokens) use ($map) : ?array {
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
						'Bingbot' => 'search',
						'bingbot' => 'search',
						'adidxbot' => 'ads',
						'DuckDuckBot' => 'search',
						'DuckDuckGo-Favicons-Bot' => 'search',
						'coccocbot-image' => 'search',
						'coccocbot-web' => 'search',
						'Baiduspider' => 'search',
						'Applebot' => 'search',
						'YandexBot' => 'search',
						'MJ12bot' => 'search',
						'Mail.RU_Bot' => 'search',
						'HaosouSpider' => 'search',
						'360Spider' => 'search',
						'Exabot' => 'search',
						'Sogou web spider' => 'search',
						'UptimeRobot' => 'monitor',
						'PetalBot' => 'search',
						'Screaming Frog SEO Spider' => 'crawler',
						'Twitterbot' => 'feed',
						'Xbot' => 'feed',
						'Discordbot' => 'feed',
						'PRTGCloudBot' => 'monitor',
						'Bytespider' => 'search',
						'LinkedInBot' => 'feed',
						'PaperLiBot' => 'feed',
						'bitlybot' => 'feed',
						'TinEye-bot' => 'search',
						'Pinterestbot' => 'feed'
					];
					return $map($value, [
						'category' => $category[$parts[0]] ?? null,
						'app' => $parts[0]
					]);
				}
				return null;
			}
		];
		return [
			'Yahoo! Slurp' => [
				'match' => 'exact',
				'categories' => $fn['search']
			],
			'facebookexternalhit/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'Google-Site-Verification/' => [
				'match' => 'start',
				'categories' => $fn['validator']
			],
			'Google-InspectionTool/' => [
				'match' => 'start',
				'categories' => $fn['search']
			],
			'Mediapartners-Google/' => [
				'match' => 'start',
				'categories' => $fn['search']
			],
			'FeedFetcher-Google' => [
				'match' => 'exact',
				'categories' => $fn['feed']
			],
			'GoogleProducer' => [
				'match' => 'exact',
				'categories' => $fn['feed']
			],
			'CFNetwork/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'Siteimprove.com' => [
				'match' => 'start',
				'categories' => $fn['crawler']
			],
			'Google Page Speed Insights' => [
				'match' => 'exact',
				'categories' => $fn['validator']
			],
			'Qwantify' => [
				'match' => 'start',
				'categories' => $fn['search']
			],
			'okhttp' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'python' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Nessus' => [
				'match' => 'start',
				'categories' => $fn['monitor']
			],
			'Chrome-Lighthouse' => [
				'match' => 'start',
				'categories' => $fn['validator']
			],
			'PingdomTMS/' => [
				'match' => 'start',
				'categories' => $fn['monitor']
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
				'categories' => $fn['ads']
			],
			'WordPress' => [
				'match' => 'start',
				'categories' => $fn['monitor']
			],
			'PRTG Network Monitor (www.paessler.com)' => [
				'match' => 'exact',
				'categories' => $fn['monitor']
			],
			'Site24x7' => [
				'match' => 'exact',
				'categories' => $fn['monitor']
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
				'categories' => $fn['feed']
			],
			'Let\'s Encrypt validation server' => [
				'match' => 'exact',
				'categories' => $fn['validator']
			],
			'Expanse' => [
				'match' => 'start',
				'categories' => $fn['crawler']
			],
			'WhatsApp/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'Apache-HttpClient/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'eCairn-Grabber/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'SEOkicks' => [
				'match' => 'exact',
				'categories' => $fn['crawler']
			],
			'PostmanRuntime/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'axios/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Java/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'curl/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'feed' => [
				'match' => 'any',
				'categories' => $fn['feed']
			],
			'spider' => [
				'match' => 'any',
				'categories' => $fn['map']
			],
			'crawler' => [
				'match' => 'any',
				'categories' => $fn['map']
			],
			'bot' => [
				'match' => 'any',
				'categories' => $fn['map']
			],
		];
	}
}