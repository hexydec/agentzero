<?php
namespace hexydec\agentzero;

class engines {

	public static function get() {
		return [
			'AppleWebKit/' =>  [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'engine' => 'WebKit',
					'engineversion' => \mb_substr($value, 12)
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
					'engineversion' => \mb_substr($value, 6)
				]
			],
			'Trident/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'engine' => 'Trident',
					'engineversion' => \mb_substr($value, 8)
				]
			],
		];
	}
}