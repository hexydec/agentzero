<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class engines {

	/**
	 * Generates a configuration array for matching engines
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
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