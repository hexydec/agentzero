<?php
use hexydec\agentzero\agentzero;

final class languagesTest extends \PHPUnit\Framework\TestCase {

	public function testLanguages() {
		$strings = [];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, agentzero::parse($ua)->toArray(), $ua);
		}
	}
}