<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class versions {

	protected static ?array $versions = null;

	protected static function load(string $source, ?string $cache, int $life = 604800) : array|false {

		// cache for this session
		$data = self::$versions;
		if ($data === null) {

			// fetch from cache
			if (\file_exists($cache) && \filemtime($cache) > \time() - $life && ($json = \file_get_contents($cache)) !== false) {

			// fetch from server
			} elseif (($json = \file_get_contents($source)) === false) {
				return false;

			// update cache
			} elseif ($cache !== null) {

				// create directory
				$dir = \dirname($cache);
				if (!\is_dir($dir) && \mkdir($dir, 0755)) {

					// cache file
					\file_put_contents($cache, $json);
				}
			}

			// decode JSON
			$data = \json_decode($json, true);
		}
		return $data ?? false;
	}

	protected static function latest(array $versions, ?\DateTime $now = null) : ?string {

		// no date restriction
		if ($now === null) {
			return \strval(\array_key_first($versions));
		} else {
			$date = \intval($now->format('Ymd'));
			foreach ($versions AS $key => $item) {
				if ($date < $item) {
					return \strval($key);
				}
			}
		}
		return null;
	}

	protected static function released(array $data, string $version) : ?string {
		$major = \intval($version);
		$len = 0;
		$i = 0;
		$vlen = \strlen($version);
		$released = null;
		foreach ($data AS $ver => $date) {
			if (\intval($ver) === $major) {
				$ver = \strval($ver); // cast as string to get letters, string keys cast to int when array keys
				$match = 0;
				for ($n = 0; $n < $vlen; $n++) {
					if ($version[$n] === ($ver[$n] ?? null)) {
						$match++;
					} else {
						break;
					}
				}
				if ($match > $len) {
					$len = $match;
					$released = $date;
				}
			}
			$i++;
		}
		return $released !== null ? (new \DateTime(\strval($released)))->format('Y-m-d') : null;
	}

	public static function get(string $browser, string $version, array $config) : array {
		if (($versions = self::load($config['source'], $config['cache'])) !== false) {
			$data = [];
			if (isset($versions[$browser])) {

				// get latest version of the browser
				$data['browserlatest'] = self::latest($versions[$browser]);
				
				// check if version is greater than latest version
				$major = \intval($version);
				$latest = \intval($data['browserlatest']);
				$first = \intval(\array_key_last($versions[$browser]));

				// version is way out of bounds (This happens sometimes, for example if the safari engine version is reported instead of the browser version)
				if ($latest + 3 < $major) {
					return [];

				// nightly build?
				} elseif ($latest + 3 === $major) {
					$data['browserstatus'] = 'nightly';

				// canary build
				} elseif ($latest + 2 === $major) {
					$data['browserstatus'] = 'canary';

				// beta release
				} elseif ($latest + 1 === $major) {
					$data['browserstatus'] = 'beta';

				// so old we don't have data for it
				} elseif ($major < $first) {
					$data['browserstatus'] = 'legacy';

				// find closes match for version
				} else {

					// get current version
					$data['browserreleased'] = self::released($versions[$browser], $version);

					// calculate status
					if (isset($data['browserreleased'])) {
						$current = \explode('.', $data['browserlatest'])[0] === \explode('.', $version)[0];
						$released = new \DateTime($data['browserreleased']);

						// legacy
						if ($released < \date_create('-5 years')) {
							$data['browserstatus'] = 'legacy';

						// outdated
						} elseif ($released < \date_create('-2 years')) {
							$data['browserstatus'] = 'outdated';

						// current
						} elseif ($current && ($released >= \date_create('-1 year') || $data['browserlatest'] === $version)) {
							$data['browserstatus'] = 'current';

						// previous
						} else {
							$data['browserstatus'] = 'previous';
						}
					}
				}
			}
			return $data;
		}
		return [];
	}
}