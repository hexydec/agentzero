<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class architectures {

	public static function get() {
		return [
			'IA64' => [
				'match' => 'any',
				'categories' => [
					'processor' => 'Intel',
					'architecture' => 'itanium',
					'bits' => 64
				]
			],
			'x86_64' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 64
				]
			],
			'WOW64' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 64
				]
			],
			'amd64' => [
				'match' => 'any',
				'categories' => [
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
				'match' => 'any',
				'categories' => [
					'processor' => 'Intel',
					'architecture' => 'x86'
				]
			],
			'PPC' => [
				'match' => 'any',
				'categories' => [
					'processor' => 'PowerPC',
					'architecture' => 'PowerPC'
				]
			],
			'x64' => [
				'match' => 'exact',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 64
				]
			],
			'Win64' => [
				'match' => 'exact',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 64
				]
			],
			'Win32' => [
				'match' => 'exact',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'x86' => [
				'match' => 'end',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'i686' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'i386' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'Sun' => [
				'match' => 'exact',
				'categories' => [
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
					'architecture' => 'x86',
					'bits' => 32
				]
			],
			'i86xpv' => [
				'match' => 'any',
				'categories' => [
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
			]
		];
	}
}