<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class engines {

	/**
	 * Generates a configuration array for matching engines
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		return [
			'Goanna/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'engine' => 'Goanna',
				'engineversion' => \mb_substr($value, 7)
			]),
			'Gecko/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'engine' => 'Gecko',
				'engineversion' => \mb_substr($value, 6)
			]),
			'Gecko' => new props('exact', [
				'type' => 'human',
				'engine' => 'Gecko'
			]),
			'Presto/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'engine' => 'Presto',
				'engineversion' => \mb_substr($value, 7)
			]),
			'Trident/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'engine' => 'Trident',
				'engineversion' => \mb_substr($value, 8)
			]),
			'AppleWebKit/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'engine' => 'WebKit',
				'engineversion' => \mb_substr($value, 12)
			]),
		];
	}
}