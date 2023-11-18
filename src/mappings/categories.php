<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class categories {

	/**
	 * Generates a configuration array for matching categories
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		return [
			'VR' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'vr'
				]
			],
			'Mobile' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'mobile'
				]
			],
			'Phone' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'mobile'
				]
			],
			'Tablet' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tablet'
				]
			],
			'Large Screen' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv'
				]
			],
			'TV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv'
				]
			],
			'Smart TV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv'
				]
			],
			'SmartTV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv'
				]
			],
			'SMART-TV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv'
				]
			],
			'DTV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv'
				]
			]
		];
	}
}