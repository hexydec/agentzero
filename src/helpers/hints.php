<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class hints {

	public static function parse(array $hints) : \stdClass {
		$map = [
			'sec-ch-ua-mobile' => fn (\stdClass $obj, string $value) : string => $obj->category = $value === '?1' ? 'mobile' : 'desktop',
			'sec-ch-ua-platform' => fn (\stdClass $obj, string $value) : string => $obj->platform = $value,
			// 'Sec-CH-UA' => fn (\stdClass $obj, string $value) : string => $obj->type = $value === '?1' ? 'mobile' : 'desktop',
			'sec-ch-ua-platform-version' => fn (\stdClass $obj, string $value) : string => $obj->platformversion = $value,
			'sec-ch-ua-model' => fn (\stdClass $obj, string $value) : string => $obj->model = $value ?: null,
			// 'Sec-CH-UA-Full-Version-List' => fn (\stdClass $obj, string $value) : string => $obj->type = $value === '?1' ? 'mobile' : 'desktop',
			'device-memory' => fn (\stdClass $obj, string $value) : int => $obj->ram = \intval(\floatval($value) * 1024),
			'width' => fn (\stdClass $obj, string $value) : int => $obj->width = \intval($value),
			// 'RTT' => fn (\stdClass $obj, string $value) : string => $obj->type = $value === '?1' ? 'mobile' : 'desktop',
			// 'Downlink' => fn (\stdClass $obj, string $value) : string => $obj->type = $value === '?1' ? 'mobile' : 'desktop',
			'ect' => fn (\stdClass $obj, string $value) : string => $obj->nettype = $value
		];
		$obj = new \stdClass();
		foreach ($hints AS $key => $item) {
			$key = \strtolower($key);
			if (isset($map[$key])) {
				$map[$key]($obj, $item);
			}
		}
		return $obj;
	}

	protected function parseBrands(string $brand) : array {

		// parse the brands in the string
		$items = [];
		foreach (\explode(',', $brand) AS $item) {
			if (\mb_stripos($item, 'brand') === false && ($pos = \mb_strrpos($item, ';')) !== false) {
				$items[\trim(\mb_substr($item, 0, $pos), '"; ')] = \trim(\mb_substr($item, $pos + 1), 'v="; ');
			}
		}

		// sort the values in importance order
		$sort = ['Chromium', 'Chrome'];
		$count = \count($sort);
		\uksort($items, function (string $a, string $b) use ($sort, $count) : int {
			$aval = $bval = $count;
			foreach ($sort AS $key => $item) {
				if (\mb_stripos($a, $item)) {
					$aval = $key;
				}
				if (\mb_stripos($b, $item)) {
					$bval = $key;
				}
			}
			return $aval - $bval;
		});
		return $items;
	}
}