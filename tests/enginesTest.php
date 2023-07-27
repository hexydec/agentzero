<?php
use hexydec\agentzero\agentzero;

final class enginesTest extends \PHPUnit\Framework\TestCase {

	public function testEngines() {
		$strings = [];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::detect($ua), $ua);
		}
	}
}