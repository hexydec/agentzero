<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class versions {

	public static function get(string $source, ?string $cache, int $life = 604800) : array|false {

		// fetch from cache
		if (\file_exists($cache) && \filemtime($cache) > \time() - $life && ($json = \file_get_contents($cache)) !== false) {

		// fetch from server
		} elseif (($json = \file_get_contents($source)) === false) {
			return false;

		// update cache
		} elseif ($cache !== null) {

			// create directory
			$dir = \dirname($cache);
			if (!\is_dir($dir)) {
				\mkdir($dir, 0755);
			}

			// cache file
			\file_put_contents($cache, $json);
		}

		// decode JSON
		return \json_decode($json, true);
	}
}