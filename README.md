# AgentZero: Fast User-Agent Detection
A library for extracting information from User-Agent strings very fast.

![Licence: MIT](https://img.shields.io/badge/Licence-MIT-lightgrey.svg)
![Status: Alpha](https://img.shields.io/badge/Status-Alpha-red.svg)

## Description

Doesn't match full UA strings or patterns, instead it extracts and categorises features from UA strings, so is faster, and can handle new UA strings or variations of common UA patterns.

Most User-Agent detection libraries rely on lists of regular expressions to match user agent string patterns and extract information. With lots of patterns you can do an ok job of getting this info, but it is not dynamic enough, which leads to minor variations or new UA strings not being captured, and they tend to be quite slow.

AgentZero is a simple string matching library that splits the user agent strings up into tokens to extract information from each part, leading to more complete information, more flexibility in capturing new user agent strings, and better performance.

## Usage

To use AgentZero:

```php
$ua = $_SERVER['HTTP_USER_AGENT']; // or whatever UA you want
$browser = \hexydec\agentzero\agentzero::detect($ua);
```

## Supported Features

AgentZero supports a wide range of architectures, browsers, rendering engines, platforms, devices, languages, and crawlers. [Access the full list on the Supported Features page](docs/support.md).

## Installation

The easiest way to get up and running is to use composer:

```
$ composer install hexydec/agentzero
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

AgentZero supports PHP version 8.0+.

## Contributing

If you find an issue with AgentZero, please create an issue in the tracker.

If you wish to fix an issue yourself, please fork the code, fix the issue, then create a pull request, and I will evaluate your submission.

## Licence

The MIT License (MIT). Please see [License File](LICENCE) for more information.