<?php

\spl_autoload_register(function (string $class) : void {
	$classes = [
		'hexydec\\agentzero\\config' => __DIR__.'/config.php',
		'hexydec\\agentzero\\agentzero' => __DIR__.'/agentzero.php'
	];
	if (isset($classes[$class])) {
		require($classes[$class]);
	}
});
