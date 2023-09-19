<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class other {

	/**
	 * Generates a configuration array for matching other
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		return [
			'{' => [
				'match' => 'any',
				'categories' => function (string $value) : ?array {
					if (($start = \mb_strpos($value, '{')) === false) {

					} elseif (($end = \mb_strpos($value, '}', $start)) !== false) {
						$json = \mb_substr($value, $start, $end - $start + 1);

						// decode JSON
						if (($data = \json_decode($json, true)) !== null) {
							$data = \array_change_key_case((array) $data);
							$map = [
								'os' => 'platform',
								'osversion' => 'platformversion',
								'isdarktheme' => 'darkmode'
							];
							$fields = ['os', 'osversion', 'platform', 'platformversion', 'app', 'appversion', 'darkmode'];
							$values = [
								'com.google.GoogleMobile' => 'Google',
								'com.google.android.gms' => 'Google',
								'com.google.chrome.ios' => 'Chrome',
								'com.google.Gmail' => 'Gmail',
								'com.google.photos' => 'Google Photos',
								'com.google.ios.youtube' => 'YouTube',
							];
							$cat = [];
							foreach ($fields AS $item) {
								if (isset($data[$item])) {
									$cat[$map[$item] ?? $item] = $values[$data[$item]] ?? $data[$item];
								}
							}
							return $cat;
						}
					}
					return null;
				}
			]
		];
	}
}