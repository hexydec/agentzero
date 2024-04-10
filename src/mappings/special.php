<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class special {

	/**
	 * Generates a configuration array for matching other
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		return [

			// has a URL in the UA, but human
			'TencentTraveler' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Tencent Traveler',
				'browserversion' => \mb_substr($value, 16) ?: null
			]),
			'QQDownload ' => new props('start', fn (string $value) : array => [
				'app' => 'QQDownload',
				'appname' => 'QQDownload',
				'appversion' => \mb_substr($value, 11)
			]),
			'EmbeddedWB ' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'desktop',
				'app' => 'Embedded Web Browser',
				'appname' => 'EmbeddedWB',
				'appversion' => \explode(' ', $value, 3)[1]
			]),

			// avant browser
			'Avant Browser' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'category' => 'desktop',
				'browser' => 'Avant Browser',
				'browserversion' => \mb_substr($value, 14) ?: null
			]),

			// grub
			'grub-client-' => new props('start', fn (string $value) : array => [
				'type' => 'robot',
				'category' => 'scraper',
				'app' => 'Grub Client',
				'appname' => 'grub-client',
				'appversion' => \mb_substr($value, 12) ?: null
			]),
		];
	}
}