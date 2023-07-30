<?php
use hexydec\agentzero\agentzero;

final class urlsTest extends \PHPUnit\Framework\TestCase {

	public function testUrls() {
		$strings = [];
		foreach ($strings AS $ua => $item) {
			$this->assertEquals($item, (array) agentzero::parse($ua), $ua);
		}
	}
}