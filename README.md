PHP multibyte functions
========
Version 1.2.0

[![Tests](https://github.com/vanderlee/PHP-multibyte-functions/actions/workflows/tests.yml/badge.svg)](https://github.com/vanderlee/PHP-multibyte-functions/actions/workflows/tests.yml)

Copyright &copy; 2015-2026 Martijn van der Lee.
MIT Open Source license applies.

Introduction
------------
A collection of multibyte string helpers and compatibility polyfills. Functions
are only declared when PHP does not already provide them, so the package can be
loaded safely on both legacy and current PHP releases.

Release 1.2.0
-------------

Version 1.2.0 adds PHP 8.4-compatible guarded polyfills, common multibyte
string helpers, and support for current PHP releases without dropping the
legacy PHP 5.x-compatible syntax.

Highlights:

* Safe loading on PHP 8.4 and newer without native-function redeclaration.
* New `mb_trim()`, `mb_ltrim()`, `mb_rtrim()`, `mb_ucfirst()`, and
  `mb_lcfirst()` compatibility implementations.
* New `mb_str_split()` and `mb_str_pad()` polyfills.
* New `mb_strrev()`, `mb_substr_replace()`, and `mb_chunk_split()` helpers.
* Automated testing across PHP 5.3, 5.6, 7.4, 8.3, 8.4, and 8.5.

PHP compatibility polyfills
---------------------------

* `mb_trim($string, $characters = null, $encoding = null)`
* `mb_ltrim($string, $characters = null, $encoding = null)`
* `mb_rtrim($string, $characters = null, $encoding = null)`
* `mb_ucfirst($string, $encoding = null)`
* `mb_lcfirst($string, $encoding = null)`
* `mb_str_split($string, $length = 1, $encoding = null)`
* `mb_str_pad($string, $length, $padString = ' ', $padType = STR_PAD_RIGHT, $encoding = null)`

The trim functions use PHP 8.4's Unicode whitespace set when `$characters` is
`null`. Explicit trim characters are treated as a simple list; range notation
such as `a..z` is not supported, matching the native API.

Additional string helpers
-------------------------

### mb_explode
`array mb_explode($pattern, $subject[, $limit = -1[, $flags = 0 ] ])`

Multibyte version of `preg_split`, including its flags. The `$pattern` behaves
like an `mb_split` pattern; the other arguments and return value follow
`preg_split`.

### mb_ucwords
`string mb_ucwords($string[, string $encoding = mb_internal_encoding() ])`

Uppercase the first character of each whitespace-delimited word in a string.

### mb_strrev
`string mb_strrev($string[, string $encoding = mb_internal_encoding() ])`

Reverse a string by characters instead of bytes.

### mb_substr_replace
`string mb_substr_replace($string, $replacement, $start[, $length = null[, $encoding = null ]])`

Replace a character range within a multibyte string, including support for
negative offsets and lengths.

### mb_chunk_split
`string mb_chunk_split($string[, $length = 76[, $separator = "\r\n"[, $encoding = null ]]])`

Split a string into fixed-width character chunks and append a separator to each
chunk.

Installation
------------

    composer require vanderlee/multibyte

Development
-----------

    composer install
    composer test
