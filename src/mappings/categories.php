<?php
namespace hexydec\agentzero;

class categories {

	public static function get() {
		return [
			'mobile' => [
				'match' => 'exact',
				'categories' => [
					'category' => 'mobile'
				]
			],
			'tablet' => [
				'match' => 'exact',
				'categories' => [
					'category' => 'tablet'
				]
			],
			'GoogleTV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'platform' => 'GoogleTV'
				]
			],
			'Screen' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv'
				]
			]
		];
	}
}