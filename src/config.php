<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class config {

	/**
	 * @var ?array $config An array of configuration values
	 */
	protected static ?array $config = null;

	/**
	 * Retrieves the configuration
	 * 
	 * @return array An array of configuration values
	 */
	public static function get() : ?array {
		if (self::$config === null) {
			self::$config = [
				'ignore' => ['Mozilla/5.0', 'Mozilla/5.0+', 'Mozilla/4.0', 'AppleWebKit/537.36', 'KHTML, like Gecko', 'Safari/537.36', 'compatible', 'Gecko/20100101', 'U', 'like', 'KHTML, somewhat like Gecko', 'wv'], // tokens that are meaningless and should be removed before processing
				'single' => ['Mobile', 'VR', 'Large Screen', 'Tablet', 'SmartTV', 'TV', 'DTV', 'Ubuntu', 'Touch', 'Linux'], // tokens that should be matched on their own
				'match' => \array_merge(
					other::get(),
					crawlers::get(),
					urls::get(),
					devices::get(),
					categories::get(),
					platforms::get(),
					architectures::get(),
					apps::get(),
					engines::get(),
					browsers::get(),
					languages::get()
				)
			];
		}
		return self::$config;
	}
}