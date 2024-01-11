<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type props from config
 */
class browsers {

	/**
	 * Generates a configuration array for matching browsers
	 * 
	 * @return props An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		$fn = [
			'browserslash' => function (string $value) : array {
				if (($browser = \mb_strrchr($value, ' ')) !== false) {
					$value = \ltrim($browser);
				}
				$parts = \explode('/', $value); // split more incase there are more slashes
				$map = [
					'opr' => 'Opera',
					'crios' => 'Chrome',
					'edg' => 'Edge',
					'edgios' => 'Edge',
					'edga' => 'Edge',
					'webpositive' => 'WebPositive',
					'nintendobrowser' => 'NintendoBrowser',
					'up.browser' => 'UP.Browser',
					'ucbrowser' => 'UCBrowser',
					'netfront' => 'NetFront',
					'seamonkey' => 'SeaMonkey',
					'icecat' => 'IceCat',
					'iceape' => 'IceApe',
					'iceweasel' => 'IceWeasel',
					'bonecho' => 'BonEcho',
					'palemoon' => 'PaleMoon',
					'k-meleon' => 'K-Meleon',
					'samsungbrowser' => 'Samsung Browser'
				];
				$data = ['type' => 'human'];
				$browser = \mb_strtolower(\array_shift($parts));
				$data['browser'] = $map[$browser] ?? \mb_convert_case($browser, MB_CASE_TITLE);
				foreach ($parts AS $item) {
					if (\strpbrk($item, '1234567890') !== false) {
						$data['browserversion'] = $item;
						break;
					}
				}
				return $data;
			},
			'presto' => function (string $value) : array {
				$parts = \explode('/', $value, 2);
				return [
					'type' => 'human',
					'browser' => $parts[0],
					'browserversion' => $parts[1] ?? null,
					'engine' => 'Presto',
					'engineversion' => $parts[1] ?? null
				];
			},
			'chromium' => function (string $value) : array {
				$parts = \explode('/', $value, 3);
				return [
					'type' => 'human',
					'browser' => \mb_convert_case($parts[0], MB_CASE_TITLE),
					'engine' => 'Blink',
					'browserversion' => $parts[1] ?? null,
					'engineversion' => isset($parts[1]) && \strspn($parts[1], '1234567890.') === \strlen($parts[1]) ? $parts[1] : null
				];
			},
			'safari' => function (string $value, int $i, array $tokens) : array {
				$version = null;
				foreach ($tokens AS $item) {
					if (\mb_stripos($item, 'Version/') === 0) {
						$version = \mb_substr($item, 8);
					}
				}
				$parts = \explode('/', $value, 2);
				return [
					'type' => 'human',
					'browser' => 'Safari',
					'browserversion' => $version ?? $parts[1] ?? null,
					'engine' => 'WebKit',
					'engineversion' => $parts[1] ?? null
				];
			},
		];
		return [
			'HeadlessChrome/' => new props('start', fn (string $value) : array => [
				'type' => 'robot',
				'category' => 'crawler',
				'browser' => 'HeadlessChrome',
				'browserversion' => \mb_substr($value, 15)
			]),
			'IEMobile/' => new props('start', $fn['browserslash']),
			'Opera Mini/' => new props('start', $fn['presto']),
			'Opera/' => new props('start', $fn['presto']),
			'OPR/' => new props('start', $fn['browserslash']),
			'CriOS/' => new props('start', $fn['browserslash']),
			'Brave/' => new props('start', $fn['browserslash']),
			'Vivaldi/' => new props('start', $fn['browserslash']),
			'Maxthon/' => new props('start', $fn['browserslash']),
			'Maxthon ' => new props('start', fn (string $value) : array => [
				'browser' => 'Maxthon',
				'browserversion' => \mb_substr($value, 8)
			]),
			'Konqueror/' => new props('start', $fn['browserslash']),
			'K-Meleon/' => new props('start', $fn['browserslash']),
			'UCBrowser/' => new props('start', $fn['browserslash']),
			'Waterfox/' => new props('start', $fn['browserslash']),
			'PaleMoon/' => new props('start', $fn['browserslash']),
			'IceWeasel/' => new props('start', $fn['browserslash']),
			'IceCat/' => new props('start', $fn['browserslash']),
			'IceApe/' => new props('start', $fn['browserslash']),
			'Basilisk/' => new props('start', $fn['browserslash']),
			'SeaMonkey/' => new props('start', $fn['browserslash']),
			'UP.Browser/' => new props('start', $fn['browserslash']),
			'Netscape/' => new props('start', $fn['browserslash']),
			'Thunderbird/' => new props('start', $fn['browserslash']),
			'Galeon/' => new props('start', $fn['browserslash']),
			'WebPositive/' => new props('start', $fn['browserslash']),
			'K-Ninja/' => new props('start', $fn['browserslash']),
			'SamsungBrowser/' => new props('start', $fn['browserslash']),
			'NintendoBrowser/' => new props('start', $fn['browserslash']),
			'Epiphany/' => new props('start', $fn['browserslash']),
			'Silk/' => new props('start', $fn['browserslash']),
			'NetFront/' => new props('start', $fn['browserslash']),
			'Dooble/' => new props('start', $fn['browserslash']),
			'Falkon/' => new props('start', $fn['browserslash']),
			'Namoroka/' => new props('start', $fn['browserslash']),
			'Lynx/' => new props('start', fn (string $value) : array => [
				'browser' => 'Lynx',
				'browserversion' => \explode('/', $value, 2)[1] ?? null,
				'engine' => 'Libwww',
				'type' => 'human',
				'category' => 'desktop'
			]),
			'Midori' => new props('start', function (string $value) : array {
				$parts = \explode('/', $value, 2);
				return [
					'type' => 'human',
					'browser' => 'Midori',
					'browserversion' => $parts[1] ?? \explode(' ', $value, 2)[1] ?? null
				];
			}),
			'PrivacyBrowser/' => new props('start', $fn['browserslash']),
			'Fennec/' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'browser' => 'Fennec',
				'engine' => 'Gecko',
				'browserversion' => \mb_substr($value, 7),
				'engineversion' => \mb_substr($value, 7)
			]),
			'Firefox/' => new props('start', function (string $value) use ($fn) : array {
				$data = $fn['browserslash']($value);
				return \array_merge($data, [
					'engine' => 'Gecko',
					'engineversion' => $data['browserversion'] ?? null
				]);
			}),
			' Firefox/' => new props('any', function (string $value) use ($fn) : array {
				$data = $fn['browserslash']($value);
				return \array_merge($data, [
					'engine' => 'Gecko',
					'engineversion' => $data['browserversion'] ?? null
				]);
			}),
			'Firefox' => new props('exact', [
				'type' => 'human',
				'engine' => 'Gecko',
				'browser' => 'Firefox'
			]),
			'Minimo/' => new props('start', function (string $value) use ($fn) : array {
				$data = $fn['browserslash']($value);
				return \array_merge($data, [
					'engine' => 'Gecko'
				]);
			}),
			'BonEcho/' => new props('start', function (string $value) use ($fn) : array {
				$data = $fn['browserslash']($value);
				return \array_merge($data, [
					'engine' => 'Gecko'
				]);
			}),
			'Links/' => new props('start', $fn['browserslash']),
			'Links' => new props('exact', fn (string $value, int $i, array $tokens) => [
				'type' => 'human',
				'browser' => $value,
				'browserversion' => $tokens[$i + 1]
			]),
			'Elinks/' => new props('start', $fn['browserslash']),
			'ELinks' => new props('exact', fn (string $value, int $i, array $tokens) => [
				'type' => 'human',
				'browser' => $value,
				'browserversion' => $tokens[$i + 1]
			]),
			'Edg/' => new props('start', $fn['browserslash']),
			'EdgA/' => new props('start', $fn['browserslash']),
			'Edge/' => new props('start', $fn['browserslash']),
			'EdgiOS/' => new props('start', $fn['browserslash']),
			'MSIE ' => new props('start', fn (string $value) : array => [
				'type' => 'human',
				'browser' => 'Internet Explorer',
				'browserversion' => \mb_substr($value, 5),
				'engine' => 'Trident'
			]),
			'Cronet/' => new props('start', $fn['chromium']),
			'Chromium/' => new props('start', $fn['chromium']),
			'Chrome/' => new props('start', $fn['chromium']),
			'Safari/' => new props('start', $fn['safari']),
			'Mozilla/' => new props('start', $fn['browserslash']),
			'rv:' => new props('start', fn (string $value) : array => [
				'browserversion' => \mb_substr($value, 3)
			])
		];
	}
}