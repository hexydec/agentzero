<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class platforms {

	/**
	 * Generates a configuration array for matching platforms
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		$fn = [
			'platformspace' => function (string $value) : array {
				$parts = \explode(' ', $value, 2);
				return [
					'platform' => $parts[0],
					'platformversion' => $parts[1] ?? null
				];
			},
			'platformlinux' => function (string $value) : array {
				if (!\str_starts_with($value, 'Red Hat/') && ($platform = \mb_strstr($value, ' ', true)) !== false) {
					$value = $platform;
				}
				$parts = \explode('/', $value, 2);
				if (!isset($parts[1])) {
					$parts = \explode('-', $value, 2);
				}
				if (!isset($parts[1])) {
					$parts = \explode(' ', $value, 2);
				}
				return [
					'type' => 'human',
					'category' => 'desktop',
					'kernel' => 'Linux',
					'platform' => $parts[0] === 'Web0S' ? 'WebOS' : $parts[0],
					'platformversion' => isset($parts[1]) && \strspn($parts[1], '0123456789.-_') > 0 ? $parts[1] : null
				];
			},
			'platformwindows' => function (string $value) : array {
				$mapping = [
					'5.0' => '2000',
					'5.1' => 'XP',
					'5.2' => 'XP',
					'6.0' => 'Vista',
					'6.1' => '7',
					'6.2' => '8',
					'6.3' => '8.1',
					'10.0' => '10'
				];
				$version = null;
				foreach (['Windows NT ', 'Windows '] AS $item) {
					if (($pos = \mb_stripos($value, $item)) !== false) {
						$version = \explode(' ', \mb_substr($value, $pos + \mb_strlen($item)))[0];
						break;
					}
				}
				return [
					'type' => 'human',
					'category' => 'desktop',
					'kernel' => 'Windows NT',
					'platform' => 'Windows',
					'platformversion' => $mapping[$version] ?? $version
				];
			}
		];

		return [

			// platforms
			'Windows NT ' => [
				'match' => 'any',
				'categories' => $fn['platformwindows']
			],
			'Windows Phone' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$version = \mb_substr($value, 14);
					return [
						'type' => 'human',
						'category' => 'mobile',
						'platform' => 'Windows Phone',
						'platformversion' => $version,
						'kernel' => \intval($version) >= 8 ? 'Windows NT' : 'Windows CE'
					];
				}
			],
			'Win98' => [
				'match' => 'start',
				'categories' => [
					'type' => 'human',
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 32,
					'kernel' => 'MS-DOS',
					'platform' => 'Windows',
					'platformversion' => '98'
				]
			],
			'WinNT' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 32,
					'kernel' => 'Windows NT',
					'platform' => 'Windows',
					'platformversion' => \mb_substr($value, 5)
				]
			],
			'Windows' => [
				'match' => 'any',
				'categories' => $fn['platformwindows']
			],
			'Mac OS X' => [
				'match' => 'any',
				'categories' => function (string $value) : array {
					$version = \str_replace('_', '.', \mb_substr($value, \mb_stripos($value, 'Mac OS X') + 9));
					$register = $version && \intval(\explode('.', $version)[1] ?? 0) >= 6 ? 64 : null;
					return [
						'type' => 'human',
						'category' => 'desktop',
						'kernel' => 'Linux',
						'platform' => 'Mac OS X',
						'platformversion' => $version === '' ? null : $version,
						'bits' => $register
					];
				}
			],
			'AppleTV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'device' => 'AppleTV',
					'platform' => 'tvOS',
					'bits' => 64
				]
			],
			'iOS/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'mobile',
					'platform' => 'iOS',
					'platformversion' => \mb_substr($value, 4)
				]
			],
			'CrOS' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode(' ', $value);
					return [
						'type' => 'human',
						'category' => 'desktop',
						'platform' => 'Chrome OS',
						'platformversion' => $parts[2] ?? null
					];
				}
			],
			'Kindle/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'ebook',
					'platform' => 'Kindle',
					'platformversion' => \mb_substr($value, 7)
				]
			],
			'Tizen' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode(' ', $value, 2);
					return [
						'type' => 'human',
						'category' => 'desktop',
						'kernel' => 'Linux',
						'platform' => $parts[0],
						'platformversion' => $parts[1] ?? null
					];
				}
			],
			'Ubuntu' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'Kubuntu' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'Mint' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'SUSE' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'Red Hat/' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'Debian' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'Darwin' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'Fedora' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'CentOS' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'Rocky' => [
				'match' => 'start',
				'categories' => $fn['platformlinux']
			],
			'ArchLinux' => [
				'match' => 'exact',
				'categories' => fn () : array => [
					'type' => 'human',
					'category' => 'desktop',
					'kernel' => 'Linux',
					'platform' => 'Arch',
				]
			],
			'Arch' => [
				'match' => 'exact',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'desktop',
					'kernel' => 'Linux',
					'platform' => $value,
				]
			],
			'Web0S' => [
				'match' => 'exact',
				'categories' => $fn['platformlinux']
			],
			'webOSTV' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'tv',
					'kernel' => 'Linux',
					'platform' => 'WebOS'
				]
			],
			'WEBOS' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'tv',
					'kernel' => 'Linux',
					'platform' => 'WebOS',
					'platformversion' => \mb_substr($value, 5)
				]
			],
			'SunOS' => [
				'match' => 'start',
				'categories' => [
					'type' => 'human',
					'category' => 'desktop',
					'kernel' => 'unix',
					'platform' => 'Solaris',
				]
			],
			'AmigaOS' => [
				'match' => 'any',
				'categories' => function (string $value) : array {
					if (($pos = \mb_stripos($value, 'AmigaOS')) !== false) {
						$value = \mb_substr($value, $pos);
					}
					$parts = \explode(' ', $value, 2);
					return [
						'type' => 'human',
						'category' => 'desktop',
						'kernel' => 'Exec',
						'platform' => $parts[0],
						'platformversion' => isset($parts[1]) && \strspn($parts[1], '0123456789.-_') === \strlen($parts[1]) ? $parts[1] : null
					];
				}
			],
			'Fuchsia' => [
				'match' => 'exact',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$os = \explode(' ', $tokens[++$i], 2);
					return [
						'type' => 'human',
						'category' => 'mobile',
						'kernel' => 'Zircon',
						'platform' => $value,
						'platformversion' => isset($os[1]) && \strspn($os[1], '0123456789.-_', \strlen($os[0])) === \strlen($os[1]) ? $os[1] : null
					];
				}
			],
			'Maemo' => [
				'match' => 'exact',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$os = \explode(' ', $tokens[++$i], 2);
					return [
						'type' => 'human',
						'category' => 'mobile',
						'kernel' => 'Linux',
						'platform' => $value,
						'platformversion' => isset($os[1]) && \strspn($os[1], '0123456789.-_', \strlen($os[0])) === \strlen($os[1]) ? $os[1] : null
					];
				}
			],
			'J2ME/MIDP' => [
				'match' => 'exact',
				'categories' => fn (string $value) : array => [
					'type' => 'human',
					'category' => 'mobile',
					'kernel' => 'Java VM',
					'platform' => $value
				]
			],
			'Haiku' => [
				'match' => 'any',
				'categories' => function (string $value) : array {
					$parts = \explode('/', $value, 2);
					return [
						'type' => 'human',
						'category' => 'desktop',
						'kernel' => 'Haiku',
						'platform' => 'Haiku',
						'platformversion' => $parts[1] ?? null
					];
				}
			],
			'BeOS' => [
				'match' => 'start',
				'categories' => function (string $value) : array {
					$parts = \explode('/', $value, 2);
					return [
						'type' => 'human',
						'category' => 'desktop',
						'kernel' => 'BeOS',
						'platform' => 'BeOS',
						'platformversion' => $parts[1] ?? null
					];
				}
			],
			'Android' => [
				'match' => 'start',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$os = \explode(' ', $value, 3);
					$device = empty($tokens[++$i]) || \strlen($tokens[$i]) <= 2 ? [] : devices::getDevice($tokens[$i]);
					return \array_merge($device, [
						'type' => 'human',
						'category' => 'tablet',
						'platform' => $os[0],
						'platformversion' => $os[1] ?? null
					]);
				}
			],
			'Linux' => [
				'match' => 'any',
				'categories' => [
					'type' => 'human',
					'kernel' => 'Linux',
					'platform' => 'Linux'
				]
			],
			'X11' => [
				'match' => 'exact',
				'categories' => function (string $value, int $i, array $tokens) : array {
					$os = \explode(' ', $tokens[++$i], 2);
					return [
						'type' => 'human',
						'category' => 'desktop',
						'kernel' => 'Linux',
						'platform' => $os[0],
						'platformversion' => isset($os[1]) && \strspn($os[1], '0123456789.-_', \strlen($os[0])) === \strlen($os[1]) ? $os[1] : null
					];
				}
			],
			'Version/' => [
				'match' => 'start',
				'categories' => fn (string $value) : array => [
					'platformversion' => \mb_substr($value, 8)
				]
			]
		];
	}
}