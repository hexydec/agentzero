<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-type MatchValue array<string, string|int|float|bool|null>|\Closure
 * @phpstan-type MatchConfig array<string,array{match: string, categories: MatchValue}>
 */
class config {

	/**
	 * Retrieves the configuration
	 * 
	 * @return array{ignore: array<int,string>, single: array<int,string>, match: MatchConfig} An array of configuration values
	 */
	public static function get() : ?array {
		static $config = [];
		if (empty($config)) {
			$config = [
				'ignore' => ['Mozilla/5.0', 'Mozilla/5.0+', 'Mozilla/4.0', 'AppleWebKit/537.36', 'KHTML', 'like Gecko', 'Safari/537.36', 'compatible', 'Gecko/20100101', 'U', 'like', 'somewhat like Gecko', 'wv'], // tokens that are meaningless and should be removed before processing
				'single' => ['Mobile', 'VR', 'Large Screen', 'Smart TV', 'Tablet', 'SmartTV', 'TV', 'DTV', 'Ubuntu', 'Touch', 'Linux'], // tokens that should be matched on their own
				'match' => \array_merge(
					languages::get(),
					other::get(),
					crawlers::get(),
					urls::get(),
					devices::get(),
					categories::get(),
					engines::get(),
					browsers::get(),
					platforms::get(),
					architectures::get(),
					apps::get()
				)
			];
		}
		return $config;
	}
}