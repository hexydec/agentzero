<?php
use hexydec\agentzero\agentzero;

final class categoriesTest extends \PHPUnit\Framework\TestCase {

	public function testCategories() {
		$strings = [];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}
}