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
							$mappings = [
								'os' => 'platform',
								'osversion' => 'platformversion'
							];
							$fields = ['os', 'osversion', 'platform', 'platformversion', 'app', 'appversion'];
							$cat = [];
							foreach ($fields AS $item) {
								if (isset($data[$item])) {
									$cat[$mappings[$item] ?? $item] = $data[$item];
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