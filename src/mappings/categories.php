<?php
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
			]
		];
	}
}