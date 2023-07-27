<?php
namespace hexydec\agentzero;

class config {

	protected static ?array $config = null;

	public static function get() : array {
		if (self::$config === null) {
			self::$config = [
				'ignore' => ['Mozilla/5.0', 'AppleWebKit/537.36', 'KHTML, like Gecko', 'Safari/537.36', 'compatible', 'Gecko/20100101', 'U'],
				'match' => \array_merge(
					crawlers::get(),
					urls::get(),
					apps::get(),
					devices::get(),
					platforms::get(),
					architectures::get(),
					engines::get(),
					browsers::get(),
					categories::get(),
					languages::get()
				)
			];
		}
		return self::$config;
	}
}