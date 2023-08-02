<?php
use hexydec\agentzero\agentzero;

final class categoriesTest extends \PHPUnit\Framework\TestCase {

	public function testCategories() {
		$strings = [];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, \array_filter((array) agentzero::parse($ua)), $ua);
		}
	}
}