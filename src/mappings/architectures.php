<?php
namespace hexydec\agentzero;

class architectures {

	public static function get() {
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
				'match' => 'exact',
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
			'arm' => [
				'match' => 'any',
				'categories' => [
					'architecture' => 'arm',
					'bits' => 32
				]
			],
			'Sun' => [
				'match' => 'exact',
				'categories' => [
					'architecture' => 'Sun'
				]
			]
		];
	}
}