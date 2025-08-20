<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class hints {

	/**
	 * Parses client hints to set agentzero properties
	 * 
	 * @param string &$ua A reference to the User-Agent string, which may be used with brand names and versions
	 * @param array $hints An array of client hints
	 * @return \stdClass A stdClass object containing parsed values for agentzero
	 */
	public static function parse(string &$ua, array $hints) : \stdClass {
		$map = [
			'sec-ch-ua-mobile' => fn (\stdClass $obj, string $value) : string => $obj->category = $value === '?1' ? 'mobile' : 'desktop',
			'sec-ch-ua-platform' => fn (\stdClass $obj, string $value) : ?string => $obj->platform = \trim($value, '"') ?: null,
			'sec-ch-ua-platform-version' => function (\stdClass $obj, string $value) : void {
				$value = \trim($value, '"');
				if (($obj->platform ?? null) === 'Windows') {
					$map = [
						'8',
						'10.1507',
						'10.1511',
						'10.1607',
						'10.1703',
						'10.1709',
						'10.1803',
						'10.1809',
						'10.1903',
						'10.1909',
						'10.2004',
						'10.20H2',
						'10.21H1',
						'10.21H2'
					];
					$major = \intval($value);
					if (isset($map[$major])) {
						$value = $map[$major] ?? '11';
					}
				}
				$obj->platformversion = $value ?: null;
			},
			'sec-ch-ua-model' => fn (\stdClass $obj, string $value) : ?string => $obj->model = \trim($value, '"') ?: null,
			'sec-ch-ua-full-version-list' => function (\stdClass $obj, string $value, string &$ua) : void {
				$brands = [];

				// process brands string
				foreach (\explode(',', $value) AS $item) {
					$parts = \explode('";v="', \trim($item, ' "'));
		
					// remove GREASE brands
					if (\strcspn($parts[0], '()-./:;=?_') === \strlen($parts[0])) {
						$brands[$parts[0]] = $parts[1];
					}
				}

				// remove Chromium if Google Chrome present
				if (isset($brands['Chromium'], $brands['Google Chrome'])) {
					unset($brands['Chromium']);
				}

				// sort the values in importance order
				$sort = ['Chromium', 'Google Chrome'];
				$count = \count($sort);
				\uksort($brands, function (string $a, string $b) use ($sort, $count) : int {
					$aval = $bval = $count;
					foreach ($sort AS $key => $item) {
						if ($a === $item) {
							$aval = $key;
						}
						if ($b === $item) {
							$bval = $key;
						}
					}
					return $aval - $bval;
				});

				// add to UA string
				foreach ($brands AS $key => $item) {
					$ua = $key.'/'.$item.' '.$ua;
				}
			},
			'device-memory' => fn (\stdClass $obj, string $value) : int => $obj->ram = \intval(\floatval($value) * 1024),
			'width' => fn (\stdClass $obj, string $value) : int => $obj->width = \intval($value),
			'ect' => fn (\stdClass $obj, string $value) : string => $obj->nettype = $value
		];
		$obj = new \stdClass();
		foreach ($hints AS $key => $item) {
			$key = \strtolower($key);
			if (isset($map[$key])) {
				$map[$key]($obj, $item, $ua);
			}
		}
		return $obj;
	}
}