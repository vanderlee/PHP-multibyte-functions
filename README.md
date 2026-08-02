PHP multibyte functions
========

[![Tests](https://github.com/vanderlee/PHP-multibyte-functions/actions/workflows/tests.yml/badge.svg)](https://github.com/vanderlee/PHP-multibyte-functions/actions/workflows/tests.yml)

Copyright &copy; 2015-2026 Martijn van der Lee.
MIT Open Source license applies.

Introduction
------------
A collection of multibyte string helpers and compatibility polyfills. Functions
are only declared when PHP does not already provide them, so the package can be
loaded safely on both legacy and current PHP releases.

PHP 8.4 polyfills
-----------------
The package provides compatible implementations of the multibyte functions
introduced in PHP 8.4:

* `mb_trim($string, $characters = null, $encoding = null)`
* `mb_ltrim($string, $characters = null, $encoding = null)`
* `mb_rtrim($string, $characters = null, $encoding = null)`
* `mb_ucfirst($string, $encoding = null)`
* `mb_lcfirst($string, $encoding = null)`

The trim functions use PHP 8.4's Unicode whitespace set when `$characters` is
`null`. An explicit `$characters` value is treated as a simple list of
multibyte characters; range notation such as `a..z` is not supported, matching
the native API.

Additional functions
--------------------

### mb_explode
`array mb_explode($pattern, $subject[, $limit = -1[, $flags = 0 ] ])`

Multibyte version of `preg_split`, including its flags. The `$pattern` behaves
like an `mb_split` pattern; the other arguments and return value follow
`preg_split`.

### mb_ucwords
`string mb_ucwords($string[, string $encoding = mb_internal_encoding() ])`

Uppercase the first character of each whitespace-delimited word in a string.

Installation
------------

    composer require vanderlee/multibyte

Development
-----------

    composer install
    composer test
