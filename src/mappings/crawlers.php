<?php
namespace hexydec\agentzero;

class crawlers {

	public static function get() {
		$fn = function (string $value) : ?array {
			if (!\str_contains($value, 'http')) { // bot will be in the URL
				$parts = \explode('/', $value, 2);
				$category = [
					'yacybot' => 'search',
					'Googlebot' => 'search',
					'Googlebot-Mobile' => 'search',
					'AdsBot-Google' => 'search',
					'Bingbot' => 'search',
					'DuckDuckBot' => 'search',
					'Baiduspider' => 'search',
					'Applebot' => 'search',
					'YandexBot' => 'search',
					'facebookexternalhit' => 'feed',
					'Mail.RU_Bot' => 'mail'
				];
				return [
					'type' => 'robot',
					'category' => $category[$parts[0]] ?? 'crawler',
					'app' => $parts[0],
					'appversion' => $parts[1] ?? null
				];
			}
			return null; 
		};
		return [
			'Yahoo! Slurp' => [
				'match' => 'exact',
				'categories' => fn (string $value) : array => [
					'type' => 'robot',
					'category' => 'search',
					'app' => $value
				]
			],
			'facebookexternalhit/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'bot' => [
				'match' => 'any',
				'categories' => $fn
			],
			'spider' => [
				'match' => 'any',
				'categories' => $fn
			],
			'AhrefsSiteAudit/' => [
				'match' => 'start',
				'categories' => $fn
			],
			'CFNetwork/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'robot',
					'category' => 'network',
					'app' => 'CFNetwork',
					'appversion' => \mb_substr($value, 10)
				]
			]
		];
	}
}