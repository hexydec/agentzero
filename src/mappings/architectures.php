<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

/**
 * @phpstan-import-type props from config
 */
class architectures {

	/**
	 * Generates a configuration array for matching architectures
	 * 
	 * @return props An array with keys representing the string to match, and a value of an array containing parsing and output settings
	 */
	public static function get() : array {
		return [
			'IA64' => new props('any', [
				'processor' => 'Intel',
				'architecture' => 'Itanium',
				'bits' => 64
			]),
			'x86_64' => new props('any', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64
			]),
			'WOW64' => new props('any', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64
			]),
			'amd64' => new props('any', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64,
				'processor' => 'AMD'
			]),
			'armv7l' => new props('any', [
				'architecture' => 'arm',
				'bits' => 32
			]),
			'aarch64' => new props('any', [
				'architecture' => 'arm',
				'bits' => 64
			]),
			'arm64' => new props('any', [
				'architecture' => 'arm',
				'bits' => 64
			]),
			'arm_64' => new props('any', [
				'architecture' => 'arm',
				'bits' => 64
			]),
			'arm' => new props('any', [
				'architecture' => 'arm',
				'bits' => 32
			]),
			'Intel' => new props('start', [
				'category' => 'desktop',
				'processor' => 'Intel',
				'architecture' => 'x86'
			]),
			'PPC' => new props('any', [
				'category' => 'desktop',
				'processor' => 'PowerPC',
				'architecture' => 'PowerPC'
			]),
			'x64' => new props('exact', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 64
			]),
			'x86' => new props('end', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32
			]),
			'i686' => new props('any', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32
			]),
			'i386' => new props('any', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32
			]),
			'Sun' => new props('exact', [
				'category' => 'desktop',
				'architecture' => 'Sun'
			]),
			'SpreadTrum' => new props('exact', [
				'type' => 'human',
				'category' => 'mobile',
				'processor' => 'Unisoc'
			]),
			'sparc64' => new props('any', [
				'processor' => 'Fujitsu',
				'architecture' => 'Spark V9',
				'bits' => 64
			]),
			'sun4u' => new props('any', [
				'processor' => 'UltraSPARK',
				'architecture' => 'Spark V9',
				'bits' => 64
			]),
			'i86pc' => new props('any', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'bits' => 32
			]),
			'i86xpv' => new props('any', [
				'category' => 'desktop',
				'architecture' => 'x86',
				'virtualised' => true,
				'bits' => 32
			]),
			'Qualcomm' => new props('any', [
				'processor' => 'Qualcomm'
			]),
			'Mhz' => new props('end', fn (string $value) : array => [
				'cpuclock' => \intval(\mb_substr($value, 0, -3))
			])
		];
	}
}