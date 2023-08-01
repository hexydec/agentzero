<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class urls {

	public static function get() {
		$fn = function (string $value, int $i, array $tokens) : ?array {
			if (($start = \stripos($value, 'http://')) === false) {
				if (($start = \stripos($value, 'https://')) === false) {
					$start = \stripos($value, 'www.');
				}
			}
			if ($start !== false) {
				$url = \rtrim(\substr($value, $start, \strcspn($value, '), ', $start)), '?+');
				$data = $i > 0 ? crawlers::getApp($tokens[--$i]) : [];
				return \array_merge([
					'type' => 'robot',
					'url' => $url,
					'category' => empty($data['app']) ? 'scraper' : 'crawler'
				], $data);
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