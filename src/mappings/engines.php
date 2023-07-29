<?php
namespace hexydec\agentzero;

class engines {

	public static function get() {
		return [
			'Goanna/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'engine' => 'Goanna',
					'engineversion' => \mb_substr($value, 7)
				]
			],
			'Gecko/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'engine' => 'Gecko',
					'engineversion' => \mb_substr($value, 6)
				]
			],
			'Presto/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'engine' => 'Presto',
					'engineversion' => \mb_substr($value, 7)
				]
			],
			'Trident/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'engine' => 'Trident',
					'engineversion' => \mb_substr($value, 8),
					'browser' => 'Internet Explorer'
				]
			],
			'AppleWebKit/' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'engine' => 'WebKit',
					'engineversion' => \mb_substr($value, 12)
				]
			],
		];
	}
}