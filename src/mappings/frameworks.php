<?php
declare(strict_types = 1);
namespace hexydec\agentzero;

class frameworks {

	/**
	 * Generates a configuration array for matching app frameworks
	 * 
	 * @return array<string,props> An array with keys representing the string to match, and values a props object defining how to generate the match and which properties to set
	 */
	public static function get() : array {
		return [
			'Electron/' => new props('start', fn (string $value) : array => [
				'framework' => 'Electron',
				'frameworkversion' => \explode('/', $value, 3)[1]
			]),
			'MAUI' => new props('start', [
				'framework' => 'MAUI'
			]),
			'Cordova' => new props('start', fn (string $value) : array => [
				'framework' => 'Cordova',
				'frameworkversion' => \explode('/', $value, 3)[1]
			]),
			'Alamofire/' => new props('start', fn (string $value) : array => [
				'framework' => 'Alamofire',
				'frameworkversion' => \explode('/', $value, 3)[1]
			]),
			'.NET CLR ' => new props('start', function (string $value, int $i, array $tokens) : array {

				// find latest version as often specifdies many versions
				$levels = [];
				for ($n = $i; $n < \count($tokens); $n++) { // may happen multiple times if there are multiple captures, but only look forward as only the first will be written
					if (\mb_stripos($tokens[$n], '.NET CLR ') === 0) {
						$ver = \array_map('\\intval', \explode('.', \mb_substr($tokens[$n], 9)));
						foreach ($ver AS $key => $item) {
							if ($item > ($levels[$key] ?? 0)) {
								$levels = $ver;
							} elseif ($item < ($levels[$key] ?? 0)) {
								break;
							}
						}
					}
				}
				return [
					'framework' => '.NET Common Language Runtime',
					'frameworkversion' => \implode('.', $levels)
				];
			}),
		];
	}
}