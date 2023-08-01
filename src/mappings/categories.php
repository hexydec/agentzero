<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class categories {

	public static function get() {
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
			'Tablet' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tablet'
				]
			],
			'Screen' => [
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