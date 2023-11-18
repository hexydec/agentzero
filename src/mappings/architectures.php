<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type MatchConfig from config
 */
class architectures {

	/**
	 * Generates a configuration array for matching architectures
	 * 
	 * @return MatchConfig An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		return [
			'IA64' => [
				'match' => 'any',
				'categories' => [
					'processor' => 'Intel',
					'architecture' => 'Itanium',
					'bits' => 64
				]
			],
			'x86_64' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 64
				]
			],
			'WOW64' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 64
				]
			],
			'amd64' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 64,
					'processor' => 'AMD'
				]
			],
			'armv7l' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'arm',
					'bits' => 32
				]
			],
			'aarch64' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'arm',
					'bits' => 64
				]
			],
			'arm64' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'arm',
					'bits' => 64
				]
			],
			'arm_64' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'arm',
					'bits' => 64
				]
			],
			'arm' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'arm',
					'bits' => 32
				]
			],
			'Intel' => [
				'match' => 'start',
				'categories' => [
					'category' => 'desktop',
					'processor' => 'Intel',
					'architecture' => 'x86'
				]
			],
			'PPC' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'processor' => 'PowerPC',
					'architecture' => 'PowerPC'
				]
			],
			'x64' => [
				'match' => 'exact',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 64
				]
			],
			'x86' => [
				'match' => 'end',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'i686' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'i386' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'Sun' => [
				'match' => 'exact',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'Sun'
				]
			],
			'SpreadTrum' => [
				'match' => 'exact',
				'categories' => [
					'type' => 'human',
					'category' => 'mobile',
					'processor' => 'Unisoc'
				]
			],
			'sparc64' => [
				'match' => 'any',
				'categories' => [
					'processor' => 'Fujitsu',
					'architecture' => 'Spark V9',
					'bits' => 64
				]
			],
			'sun4u' => [
				'match' => 'any',
				'categories' => [
					'processor' => 'UltraSPARK',
					'architecture' => 'Spark V9',
					'bits' => 64
				]
			],
			'i86pc' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'i86xpv' => [
				'match' => 'any',
				'categories' => [
					'category' => 'desktop',
					'architecture' => 'x86',
					'virtualised' => true,
					'bits' => 32
				]
			],
			'Qualcomm' => [
				'match' => 'any',
				'categories' => [
					'processor' => 'Qualcomm'
				]
			],
			'Mhz' => [
				'match' => 'end',
				'categories' => fn (string $value) : array => [
					'cpuclock' => \intval(\mb_substr($value, 0, -3))
				]
			]
		];
	}
}