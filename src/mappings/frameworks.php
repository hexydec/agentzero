<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class frameworks {

	/**
	 * Generates a configuration array for matching app frameworks
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		return [
			'Electron/' => new props('start', fn (string $value) : array => [
				'framework' => 'Electron',
				'frameworkversion' => \explode('/', $value, 3)[1]
			]),
			'MAUI' => new props('start', [
				'framework' => 'MAUI'
			]),
			'Cordova' => new props('start', fn (string $value) : array => [
				'framework' => 'Cordova',
				'frameworkversion' => \explode('/', $value, 3)[1]
			])
		];
	}
}