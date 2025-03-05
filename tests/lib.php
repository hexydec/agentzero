<?php
declare(strict_types = 1);
use hexydec\agentzero\agentzero;

class lib {

	public static function parse(string $ua, array $hints = []) : array {
		$arr = \array_filter(
			\array_diff_key((array) agentzero::parse($ua, $hints), ['browserstatus' => '', 'browserlatest' => '']),
			fn (mixed $item) : mixed => $item !== null
		);
		return $arr;
	}
}