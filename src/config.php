<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class config {

	/**
	 * Retrieves the configuration
	 * 
	 * @return array{ignore: array<int,string>, single: array<int,string>, match: array<string,props>} An array of configuration values
	 */
	public static function get(array $config = []) : ?array {
		static $default = [];
		if (empty($default)) {
			$default = [
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
					browsers::get(),
					platforms::get(),
					architectures::get(),
					other::get(),
					apps::get(),
					frameworks::get()
				),
				'versionssource' => 'https://raw.githubusercontent.com/hexydec/versions/refs/heads/main/dist/versions.json', // browser version data source
				'versionscache' => null, // location of the cache file, null to not fetch version data
				'versionscachelife' => 604800, // how long to cache for
				'currentdate' => null // the point in time to calculate the browser data from, may be in the past (DateTime object)
			];
		}
		return \array_replace_recursive($default, $config);
	}
}