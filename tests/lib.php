<?php
declare(strict_types = 1);
use hexydec\agentzero\agentzero;

class lib {

	public static function parse(string $ua) : array {
		$arr = \array_filter(
			\array_diff_key((array) agentzero::parse($ua), ['browserstatus' => '', 'browserlatest' => '']),
			fn (mixed $item) : mixed => $item !== null
		);
		return $arr;
	}
}