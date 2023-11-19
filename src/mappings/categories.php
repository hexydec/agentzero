<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type props from config
 */
class categories {

	/**
	 * Generates a configuration array for matching categories
	 * 
	 * @return props An array with keys representing the string to match, and a value of an array containing parsing and output settings
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
			'Phone' => new props('exact', [
				'type' => 'human',
				'category' => 'mobile'
			]),
			'Tablet' => new props('exact', [
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