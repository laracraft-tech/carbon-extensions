# Some useful extension for the carbon library!

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laracraft-tech/carbon-extensions.svg?style=flat-square)](https://packagist.org/packages/laracraft-tech/carbon-extensions)
[![Tests](https://github.com/laracraft-tech/carbon-extensions/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/laracraft-tech/carbon-extensions/actions/workflows/run-tests.yml)
[![Check & fix styling](https://github.com/laracraft-tech/carbon-extensions/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main)](https://github.com/laracraft-tech/carbon-extensions/actions/workflows/fix-php-code-style-issues.yml)
[![License](https://img.shields.io/packagist/l/laracraft-tech/carbon-extensions.svg?style=flat-square)](https://packagist.org/packages/laracraft-tech/carbon-extensions)
<!--[![Total Downloads](https://img.shields.io/packagist/dt/laracraft-tech/carbon-extensions.svg?style=flat-square)](https://packagist.org/packages/laracraft-tech/carbon-extensions)-->

Here we will share some useful carbon extensions, which we need in our daily work.

## Installation

You can install the package via composer:

```bash
composer require laracraft-tech/carbon-extensions
```

## Usage

### CarbonFiscalYear

---

The `CarbonFiscalYear` class helps you to work with **fiscal years**!
It easily lets you know the fiscal years **start** and **end** of a given date.

**Note:** There is also a `CarbonFiscalYearImmutable`, class which has the same API,
but it works _immutable_. For more information on _immutables_, check out the [carbon docs](https://carbon.nesbot.com/docs/).

```php
// set your fiscal year start month and day 
CarbonFiscalYear::setFiscalYearStart(4, 1);

$date = CarbonFiscalYear::parse("2022-03-30");
$date->startOfYear()->format("Y-m-d"); // 2021-04-01
$date->endOfYear()->format("Y-m-d"); // 2022-03-31

$date2 = CarbonFiscalYear::parse("2022-04-02");
$date2->startOfYear()->format("Y-m-d"); // 2022-04-01
$date2->endOfYear()->format("Y-m-d"); // 2023-03-31
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Zacharias Creutznacher](https://github.com/laracraft-tech)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
