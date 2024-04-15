# AgentZero: Fast User-Agent Detection
A library for extracting information from User-Agent strings very fast.

![Licence: MIT](https://img.shields.io/badge/Licence-MIT-lightgrey.svg)
[![Tests Status](https://github.com/hexydec/agentzero/actions/workflows/tests.yml/badge.svg)](https://github.com/hexydec/agentzero/actions/workflows/tests.yml)
[![Code Coverage](https://scrutinizer-ci.com/g/hexydec/agentzero/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/hexydec/agentzero/code-structure/main/code-coverage)

## Description

Doesn't match full UA strings or patterns, instead it extracts and categorises features from UA strings, so is faster, and can handle new UA strings or variations of common UA patterns.

Most User-Agent detection libraries rely on lists of regular expressions to match user agent string patterns and extract information. With lots of patterns you can do an ok job of getting this info, but it is not dynamic enough, which leads to minor variations or new UA strings not being captured, and they tend to be quite slow.

AgentZero is a simple string matching library that splits the user agent strings up into tokens to extract information from each part, leading to more complete information, more flexibility in capturing new user agent strings, and better performance.

You can try out AgentZero online at [https://hexydec.com/apps/user-agent-parser/](https://hexydec.com/apps/user-agent-parser/), or run the supplied `index.php` file after installation.

## Usage

To use AgentZero:

```php
$ua = $_SERVER['HTTP_USER_AGENT']; // or whatever UA you want e.g:
$ua = 'Mozilla/5.0 (Linux; Android 13; Pixel 7 Pro Build/TD1A.220804.031; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/116.0.0.0 Mobile Safari/537.36 Instagram 301.1.0.33.110 Android (33/13; 420dpi; 1080x2116; Google/google; Pixel 7 Pro; cheetah; cheetah; en_GB; 517986703)';
$browser = \hexydec\agentzero\agentzero::parse($ua);
```
The returned value will be something like:

```php
\hexydec\agentzero\agentzero (

	public readonly string 'string' => string 'Mozilla/5.0 (Linux; Android 13; Pixel 7 Pro Build/TD1A.220804.031; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/116.0.0.0 Mobile Safari/537.36 Instagram 301.1.0.33.110 Android (33/13; 420dpi; 1080x2116; Google/google; Pixel 7 Pro; cheetah; cheetah; en_GB; 517986703)';

	// categories
	public readonly ?string 'type' => string 'human';
	public readonly ?string 'category' => string 'mobile';

	// device
	public readonly ?string 'vendor' => string 'Google';
	public readonly ?string 'device' => string 'Pixel';
	public readonly ?string 'model' => string '7 Pro';
	public readonly ?string 'build' => string 'TD1A.220804.031';
	public readonly ?int 'ram' => null;

	// architecture
	public readonly ?string 'processor' => null;
	public readonly ?string 'architecture' => null;
	public readonly ?int 'bits' => null;
	public readonly ?string 'cpu' => null;
	public readonly ?int 'cpuclock' => null;

	// platform
	public readonly ?string 'kernel' => string 'Linux';
	public readonly ?string 'platform' => string 'Android';
	public readonly ?string 'platformversion' => string '13';

	// browser
	public readonly ?string 'engine' => string 'Blink';
	public readonly ?string 'engineversion' => string '116.0.0.0';
	public readonly ?string 'browser' => string 'Chrome';
	public readonly ?string 'browserversion' => string '116.0.0.0';
	public readonly ?string 'language' => string 'en-GB';

	// app
	public readonly ?string 'app' => string 'Instagram';
	public readonly ?string 'appname' => string 'Instagram';
	public readonly ?string 'appversion' => string '301.1.0.33.110';
	public readonly ?string 'framework' => null;
	public readonly ?string 'frameworkversion' => null;
	public readonly ?string 'url' => null;

	// network
	public readonly ?string 'nettype' => null;
	public readonly ?string 'proxy' => null;

	// screen
	public readonly ?int 'width' => int 1080
	public readonly ?int 'height' => int 2116
	public readonly ?int 'dpi' => int 420
	public readonly ?float 'density' => null;
	public readonly ?bool 'darkmode' => null;;
);
```

You can read the [full list of properties here](docs/api.md).

## Supported Features

AgentZero supports a wide range of architectures, browsers, rendering engines, platforms, devices, languages, and crawlers. [Access the full list on the Supported Features page](docs/support.md).

## Installation

The easiest way to get up and running is to use composer:

```
$ composer require hexydec/agentzero
```

## Test Suite

You can run the test suite like this:

### Linux
```
$ vendor/bin/phpunit
```
### Windows
```
> vendor\bin\phpunit
```

## Support

AgentZero supports PHP version 8.1+.

## Contributing

If you find an issue with AgentZero, please create an issue in the tracker.

If you wish to fix an issue yourself, please fork the code, fix the issue, then create a pull request, and I will evaluate your submission.

## Licence

The MIT License (MIT). Please see [License File](LICENCE) for more information.
