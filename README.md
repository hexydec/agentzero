# AgentZero: Fast User-Agent Detection
A zero knowledge library for extracting information from User-Agent strings.

![Licence: MIT](https://img.shields.io/badge/Licence-MIT-lightgrey.svg)
![Status: Alpha](https://img.shields.io/badge/Status-Alpha-red.svg)

## Description

Most User-Agent detection libraries rely on lists of regular expressions to match user agent string patterns and extract information. 

With lots of patterns you can do an ok job of getting this info, but it is not dynamic enough, which leads to minor variations or new UA strings not being captured, and they tend to be quite slow.

AgentZero is a simple string matching library that splits the user agent strings up into tokens to extract information from each part, leading to more complete information, more flexibility in capturing new user agent strings, and better performance.

It will not capture everything perfectly, but for the main part it will be good enough, and if you need to process a lot of strings, fast enough also.

## Usage

To use AgentZero:

```php
$ua = $_SERVER['HTTP_USER_AGENT']; // or whatever UA you want
$browser = \hexydec\agentzero\agentzero::detect($ua);
```

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

If you find an issue with JSlite, please create an issue in the tracker.

If you wish to fix an issue yourself, please fork the code, fix the issue, then create a pull request, and I will evaluate your submission.

## Licence

The MIT License (MIT). Please see [License File](LICENCE) for more information.