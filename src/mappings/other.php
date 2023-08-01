<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class other {

	public static function get() {
		return [
			'{' => [
				'match' => 'any',
				'categories' => function (string $value) : ?array {
					$start = \mb_strpos($value, '{');
					if (($end = \mb_strpos($value, '}', $start)) !== false) {
						$json = \mb_substr($value, $start, $end - $start + 1);

						// decode JSON
						if (($data = \json_decode($json, true)) !== null) {
							$data = \array_change_key_case($data);
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