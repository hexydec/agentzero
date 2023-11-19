<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type props from config
 */
class other {

	/**
	 * Generates a configuration array for matching other
	 * 
	 * @return props An array with keys representing the string to match, and a value of an array containing parsing and output settings
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
						if ($data['app'] === 'com.google.chrome.ios') {
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
						$values = [
							'com.google.GoogleMobile' => 'Google',
							'com.google.android.gms' => 'Google',
							'com.google.Gmail' => 'Gmail',
							'com.google.photos' => 'Google Photos',
							'com.google.ios.youtube' => 'YouTube'
						];
						foreach ($fields AS $item) {
							if (isset($data[$item])) {
								$cat[$map[$item] ?? $item] = $values[$data[$item]] ?? $data[$item];
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