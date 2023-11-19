<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
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
				'appversion' => empty($parts[1]) ? null : $parts[1]
			], $data);
		}
		return [];
	}

	/**
	 * Generates a configuration array for matching crawlers
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		$fn = [
			'search' => fn (string $value) : array => self::getApp($value, ['category' => 'search']),
			'ads' => fn (string $value) : array => self::getApp($value, ['category' => 'ads']),
			'validator' => fn (string $value) : array => self::getApp($value, ['category' => 'validator']),
			'feed' => fn (string $value) : array => self::getApp($value, ['category' => 'feed']),
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
						'Applebot' => 'search',
						'YandexBot' => 'search',
						'MJ12bot' => 'search',
						'Mail.RU_Bot' => 'search',
						'Exabot' => 'search',
						'UptimeRobot' => 'monitor',
						'PetalBot' => 'search',
						'Twitterbot' => 'feed',
						'Xbot' => 'feed',
						'Discordbot' => 'feed',
						'PRTGCloudBot' => 'monitor',
						'SematextSyntheticsRobot' => 'monitor',
						'LinkedInBot' => 'feed',
						'PaperLiBot' => 'feed',
						'bitlybot' => 'feed',
						'TinEye-bot' => 'search',
						'Pinterestbot' => 'feed',
						'WebCrawler' => 'crawler',
						'webprosbot' => 'crawler',
						'GuzzleHttp' => 'scraper',
						'TelegramBot' => 'feed',
						'Ruby' => 'scraper',
						'SEMrushBot' => 'crawler',
						'Mediatoolkitbot' => 'crawler',
						'IPLoggerBot' => 'monitor'
					];
					return self::getApp($value, [
						'category' => $category[$parts[0]] ?? (\mb_stripos($value, 'crawler') !== false ? 'crawler' : null),
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
			'Mediapartners-Google' => [
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
			'Google-adstxt' => [
				'match' => 'exact',
				'categories' => $fn['ads']
			],
			'CFNetwork/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'Siteimprove.com' => [
				'match' => 'any',
				'categories' => $fn['crawler']
			],
			'CyotekWebCopy' => [
				'match' => 'start',
				'categories' => $fn['scraper']
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
			'jsdom/' => [
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
			'Siege/' => [
				'match' => 'start',
				'categories' => $fn['validator']
			],
			'PingdomTMS/' => [
				'match' => 'start',
				'categories' => $fn['monitor']
			],
			'DynGate' => [
				'match' => 'exact',
				'categories' => $fn['monitor']
			],
			'Datadog/Synthetics' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'robot',
					'category' => 'monitor',
					'app' => 'Datadog/Synthetics'
				]
			],
			'RuxitSynthetic/' => [
				'match' => 'start',
				'categories' => $fn['monitor']
			],
			'Checkly/' => [
				'match' => 'start',
				'categories' => $fn['monitor']
			],
			'Uptime/' => [
				'match' => 'start',
				'categories' => $fn['monitor']
			],
			'HostTracker/' => [
				'match' => 'start',
				'categories' => $fn['monitor']
			],
			'NCSC Web Check feedback.webcheck@digital.ncsc.gov.uk' => [
				'match' => 'exact',
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
			'PRTG Network Monitor' => [
				'match' => 'exact',
				'categories' => $fn['monitor']
			],
			'Site24x7' => [
				'match' => 'exact',
				'categories' => $fn['monitor']
			],
			'StatusCake' => [
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
			'Rogerbot/' => [
				'match' => 'start',
				'categories' => $fn['crawler']
			],
			'Go-http-client/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'DashLinkPreviews/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'Microsoft Office' => [
				'match' => 'start',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$data = [
						'type' => 'human'
					];
					if (\str_contains($value, '/')) {
						foreach (\array_slice($tokens, $i + 1) AS $item) {
							if (\str_starts_with($item, 'Microsoft ')) {
								$parts = \explode(' ', $item);
								$data['app'] = $parts[0].' '.$parts[1];
								if (isset($parts[2])) {
									$data['appversion'] = $parts[2];
								}
								break;
							}
						}
						if (!isset($data['app'])) {
							$parts = \explode('/', $value, 2);
							$data['app'] = $parts[0];
							if (!isset($data['appversion'])) {
								$data['appversion'] = $parts[1];
							}
						}
					} else {
						$parts = \explode(' ', $value);
						$data['app'] = \rtrim($parts[0].' '.($parts[1] ?? '').' '.($parts[2] ?? ''));
						$data['appversion'] = $parts[3] ?? null;
					}
					return $data;
				}
			],
			'PycURL/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'lua-resty-http/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Snapchat/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'HTTPClient/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'WhatsApp/' => [
				'match' => 'any',
				'categories' => $fn['feed']
			],
			'Hootsuite-Authoring/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'ApacheBench/' => [
				'match' => 'start',
				'categories' => $fn['validator']
			],
			'Asana/' => [
				'match' => 'start',
				'categories' => $fn['feed']
			],
			'Java/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'curl/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Wget/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'rest-client/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'ruby/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'libcurl/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Bun/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'CakePHP' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'cpp-httplib/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Dart/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Deno/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'libwww-perl/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'GuzzleHttp/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'Cpanel-HTTP-Client/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'akka-http/' => [
				'match' => 'start',
				'categories' => $fn['scraper']
			],
			'feed' => [
				'match' => 'any',
				'categories' => $fn['feed']
			],
			'spider' => [
				'match' => 'any',
				'categories' => $fn['crawler']
			],
			'crawler' => [
				'match' => 'any',
				'categories' => $fn['map']
			],
			'bot/' => [
				'match' => 'any',
				'categories' => $fn['map']
			],
			'bot-' => [
				'match' => 'any',
				'categories' => $fn['map']
			],
			' bot ' => [
				'match' => 'any',
				'categories' => $fn['map']
			],
			'bot' => [
				'match' => 'end',
				'categories' => $fn['map']
			],
		];
	}
}