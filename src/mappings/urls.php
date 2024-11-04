<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class urls {

	/**
	 * Generates a configuration array for matching URL's
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
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
			'.' => new props('any', function (string $value) : ?array {
				foreach (\explode(' ', $value) AS $item) {
					if (!\str_starts_with($item, 'com.') && \substr_count($item, '.') >= 2) {
						foreach (\explode('.', $item) AS $part) {
							if (!\ctype_alpha(\substr($part, 0, 1)) || \strspn($part, '0123456789qwertyuiopasdfghjklzxcvbnm-') !== \strlen($part)) {
								return null;
							}	
						}
						return [
							'url' => $item
						];
					}
				}
				return null;
			})
		];
	}
}