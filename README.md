[![Latest Stable Version][latest stable version]][1]
 [![GitHub stars][github stars]][1]
 [![Total Downloads][total downloads]][1]
 [![License][license]][1]

# ECPHP PHP conventions

## Description

A developer tool which provides a pre-defined [GrumPHP][5] configuration
tailored specifically for PHP development at [European Commission][6].

This package has been inspired by [drupol/php-conventions][19] and
[ergebnis/php-library-template][20].

## Features

Based on [GrumPHP][5], this tool will run a set of quality control tools via a
git hook. The user is free to disable the git hook and run the tool manually
instead, see the [documentation][24] to know more about that.

The default [GrumPHP][5] configuration ships with the following checks:

* [License file][21] creation (*BSD-3-Clause by default*),
* [Composer Require Checker][22],
* composer.json validation,
* [composer.json normalization][7],
* YAML Lint,
* JSON Lint,
* [PHP Lint][8],
* [Twig CS][9],
* [PHP CS Fixer][10] checks (*Based on [PSR12][11]*),
* [PHP CS][12],
* [PHPStan][13].
* [Psalm][23].

It provides a default configuration for each task, and they are customizable at
will through a simple YAML configuration file.

Tasks can be also added or skipped according to your needs.

## Installation

```shell
composer require ecphp/php-conventions --dev
```

Add or edit the file `grumphp.yml.dist` or `grumphp.yml` and add on the top it:

```yaml
imports:
  - { resource: vendor/ecphp/php-conventions/config/php73/grumphp.yml }
```

Replace the string `php73` with the minimal version of PHP you want to support.

Current choices are:

* `psr12`
* `php73`
* `php74` (*Not available yet*)

You may configure everything from that file.

To add an extra task or skip a task:

```yaml
imports:
  - { resource: vendor/ecphp/php-conventions/config/php73/grumphp.yml }

parameters:
  extra_tasks:
    phpunit: ~
  skip_tasks:
    - phpstan
```

To edit the configuration of a particular existing task

```yaml
imports:
  - { resource: vendor/ecphp/php-conventions/config/php73/grumphp.yml }

parameters:
  tasks.license.holder: <License holder here>
  tasks.license.name: BSD-3-Clause # MIT and EUPL-1.2 are also available
  tasks.license.date_from: 2019
```

Find all the available customizable properties in the imported file on the top
of the YAML file.

## Usage

## Basic usage

```shell
vendor/bin/grumphp run
```

This will run all the pre-configured tasks.

### Advanced usage

If you're willing to specify a group of tasks only, you can use the
pre-defined test suites.

Available test-suites are:

* `cs`
  * license
  * composer_require_checker
  * composer
  * composer_normalize
  * yamllint
  * jsonlint
  * phplint
  * twigcs
  * phpcsfixer
  * phpcs
* `static-analysis`
  * phpstan
  * psalm

To run a particular test-suite:

```shell
vendor/bin/grumphp run --testsuite=cs
```

To run particular tasks:

```shell
vendor/bin/grumphp run --tasks=phpcsfixer,phpcs
```

## Contributing

Report bug on the [issue tracker][14].

See the file [CONTRIBUTING.md][18] but feel free to contribute to this library by sending Github pull requests.

## Changelog

See [CHANGELOG.md][15] for a changelog based on [git commits][16].

For more detailed changelogs, please check [the release changelogs][17].

[latest stable version]: https://img.shields.io/packagist/v/ecphp/php-conventions.svg?style=flat-square
[github stars]: https://img.shields.io/github/stars/ecphp/php-conventions.svg?style=flat-square
[total downloads]: https://img.shields.io/packagist/dt/ecphp/php-conventions.svg?style=flat-square
[license]: https://img.shields.io/packagist/l/ecphp/php-conventions.svg?style=flat-square
[1]: https://packagist.org/packages/ecphp/php-conventions
[2]: https://github.com/ecphp/php-conventions/actions
[3]: https://scrutinizer-ci.com/g/ecphp/php-conventions/?branch=master
[4]: https://shepherd.dev/github/ecphp/php-conventions
[5]: https://packagist.org/packages/grumphp/grumphp
[6]: https://ec.europa.eu
[7]: https://packagist.org/packages/ergebnis/composer-normalize
[8]: https://packagist.org/packages/php-parallel-lint/php-parallel-lint
[9]: https://packagist.org/packages/friendsoftwig/twigcs
[10]: https://packagist.org/packages/FriendsOfPHP/PHP-CS-Fixer
[11]: https://www.php-fig.org/psr/psr-12/
[12]: https://packagist.org/packages/squizlabs/php_codesniffer
[13]: https://packagist.org/packages/phpstan/phpstan
[14]: https://github.com/ecphp/php-conventions/issues
[15]: https://github.com/ecphp/php-conventions/blob/master/CHANGELOG.md
[16]: https://github.com/ecphp/php-conventions/commits/master
[17]: https://github.com/ecphp/php-conventions/releases
[18]: https://github.com/ecphp/php-conventions/blob/master/.github/CONTRIBUTING.md
[19]: https://packagist.org/packages/drupol/php-conventions
[20]: https://packagist.org/packages/ergebnis/php-library-template
[21]: https://packagist.org/packages/ergebnis/license
[22]: https://packagist.org/packages/maglnet/composer-require-checker
[23]: https://packagist.org/packages/vimeo/psalm
[24]: https://github.com/phpro/grumphp/blob/master/doc/commands.md
