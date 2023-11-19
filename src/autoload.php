<?php
declare(strict_types = 1);

\spl_autoload_register(function (string $class) : void {
	$classes = [
		'hexydec\\agentzero\\apps' => __DIR__.'/mappings/apps.php',
		'hexydec\\agentzero\\architectures' => __DIR__.'/mappings/architectures.php',
		'hexydec\\agentzero\\browsers' => __DIR__.'/mappings/browsers.php',
		'hexydec\\agentzero\\crawlers' => __DIR__.'/mappings/crawlers.php',
		'hexydec\\agentzero\\devices' => __DIR__.'/mappings/devices.php',
		'hexydec\\agentzero\\engines' => __DIR__.'/mappings/engines.php',
		'hexydec\\agentzero\\languages' => __DIR__.'/mappings/languages.php',
		'hexydec\\agentzero\\platforms' => __DIR__.'/mappings/platforms.php',
		'hexydec\\agentzero\\categories' => __DIR__.'/mappings/categories.php',
		'hexydec\\agentzero\\urls' => __DIR__.'/mappings/urls.php',
		'hexydec\\agentzero\\other' => __DIR__.'/mappings/other.php',
		'hexydec\\agentzero\\config' => __DIR__.'/config.php',
		'hexydec\\agentzero\\props' => __DIR__.'/helpers/props.php',
		'hexydec\\agentzero\\agentzero' => __DIR__.'/agentzero.php'
	];
	if (isset($classes[$class])) {
		require($classes[$class]);
	}
});
