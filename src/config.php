<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class config {

	/**
	 * Retrieves the configuration
	 * 
	 * @return array{ignore: array<int,string>, single: array<int,string>, match: array<string,props>} An array of configuration values
	 */
	public static function get() : ?array {
		static $config = [];
		if (empty($config)) {
			$versions = versions::get(
				'D:/Websites/versions/dist/versions.json', //'https://raw.githubusercontent.com/hexydec/versions/refs/heads/main/dist/versions.json',
				\dirname(__DIR__).'/cache/versions.json'
			);
			$config = [
				'ignore' => ['mozilla/5.0', 'mozilla/5.0+', 'mozilla/4.0', 'applewebkit/537.36', 'khtml', 'like gecko', 'khtml', 'like gecko', 'safari/537.36', 'compatible', 'gecko/20100101', 'u', 'u', 'like', 'somewhat like gecko', 'wv', 'embeddedwb 14.52 from:'], // tokens that are meaningless and should be removed before processing
				'single' => ['Mobile', 'Moblie', 'VR', 'Large Screen', 'Smart TV', 'Tablet', 'SmartTV', 'TV', 'DTV', 'Ubuntu', 'Touch', 'Linux', 'Gentoo', 'Gecko', 'AppleWebKit/537.36'], // tokens that should be matched on their own
				'match' => \array_merge(
					special::get(), // to override others
					languages::get(),
					crawlers::get(),
					urls::get(),
					devices::get(),
					categories::get(),
					engines::get(),
					browsers::get($versions ?: []),
					platforms::get(),
					architectures::get(),
					other::get(),
					apps::get(),
					frameworks::get()
				)
			];
		}
		return $config;
	}
}