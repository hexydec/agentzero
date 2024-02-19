<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class other {

	/**
	 * Generates a configuration array for matching other
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		return [
			'{' => new props('any', function (string $value) : ?array {
				if (($start = \mb_strpos($value, '{')) === false) {

				} elseif (($end = \mb_strpos($value, '}', $start)) !== false) {
					$json = \mb_substr($value, $start, $end - $start + 1);

					// decode JSON
					if (($data = \json_decode($json, true)) !== null) {
						$cat = [];
						$data = \array_change_key_case((array) $data);

						// special case for chrome - browser
						if (($data['app'] ?? null) === 'com.google.chrome.ios') {
							$cat['browser'] = 'Chrome';
							$cat['browserversion'] = $data['appversion'] ?? null;
							unset($data['app'], $data['appversion']);
						}

						// map values
						$map = [
							'os' => 'platform',
							'osversion' => 'platformversion',
							'isdarktheme' => 'darkmode'
						];
						$fields = ['os', 'osversion', 'platform', 'platformversion', 'app', 'appversion', 'isdarktheme'];
						foreach ($fields AS $item) {
							if (isset($data[$item])) {
								if ($item === 'app') {
									$cat['app'] = apps::getApp($data[$item]);
									$cat['appname'] = $data[$item];
								} else {
									$cat[$map[$item] ?? $item] = $data[$item];
								}
							}
						}
						return $cat;
					}
				}
				return null;
			})
		];
	}
}