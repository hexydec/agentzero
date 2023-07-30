<?php
namespace hexydec\agentzero;

class urls {

	public static function get() {
		$fn = function (string $value) : ?array {
			if (($start = \stripos($value, 'http')) === false) {
				$start = \stripos($value, 'www.');
			}
			if ($start !== false) {
				return [
					'type' => 'robot',
					'url' => \rtrim(\substr($value, $start, \strcspn($value, '), ', $start)), '?+')
				];
			}
			return null;
		};
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