<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class categories {

	/**
	 * Generates a configuration array for matching categories
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		return [
			'VR' => new props('exact', [
				'type' => 'human',
				'category' => 'vr'
			]),
			'Mobile' => new props('exact', [
				'type' => 'human',
				'category' => 'mobile'
			]),
			'Phone' => new props('any', [
				'type' => 'human',
				'category' => 'mobile'
			]),
			'PDA' => new props('exact', [
				'type' => 'human',
				'category' => 'mobile'
			]),
			'Tablet' => new props('exact', [
				'type' => 'human',
				'category' => 'tablet'
			]),
			'TAB ' => new props('start', [
				'type' => 'human',
				'category' => 'tablet'
			]),
			'TAB_' => new props('start', [
				'type' => 'human',
				'category' => 'tablet'
			]),
			'Large Screen' => new props('exact', [
				'type' => 'human',
				'category' => 'tv'
			]),
			'TV' => new props('exact', [
				'type' => 'human',
				'category' => 'tv'
			]),
			'Smart TV' => new props('exact', [
				'type' => 'human',
				'category' => 'tv'
			]),
			'SmartTV' => new props('exact', [
				'type' => 'human',
				'category' => 'tv'
			]),
			'SMART-TV' => new props('exact', [
				'type' => 'human',
				'category' => 'tv'
			]),
			'DTV' => new props('exact', [
				'type' => 'human',
				'category' => 'tv'
			])
		];
	}
}