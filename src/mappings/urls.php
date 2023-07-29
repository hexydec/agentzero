<?php
namespace hexydec\agentzero;

class urls {

	public static function get() {
		$fn = fn (string $value) : array => [
			'url' => \ltrim($value, '+'),
			'type' => 'robot'
		];
		return [
			'http://' => [
				'match' => 'any',
				'categories' => $fn
			],
			'https://' => [
				'match' => 'any',
				'categories' => $fn
			],
			'www.' => [
				'match' => 'start',
				'categories' => $fn
			],
			'.com' => [
				'match' => 'any',
				'categories' => $fn
			],
		];
	}
}