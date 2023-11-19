<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type props from config
 */
class urls {

	/**
	 * Generates a configuration array for matching URL's
	 * 
	 * @return props An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
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
			'http://' => new props('any', $fn),
			'https://' => new props('any', $fn),
			'www.' => new props('start', $fn),
			'.com' => new props('any', $fn),
		];
	}
}