PHP multibyte functions
========
Version 1.1.1

[![Build Status](https://travis-ci.org/vanderlee/PHP-multibyte-functions.svg)](https://travis-ci.org/vanderlee/PHP-multibyte-functions)

Copyright &copy; 2015-2016 Martijn van der Lee.
MIT Open Source license applies.

Introduction
------------
This is just a collection of multibyte (mb_*) functions to augment the builtin
functions.

Unittests included.

Methods
-------
### mb_explode
`array mb_explode($pattern, $subject[, $limit = -1[, $flags = 0 ] ])`

Multibyte version of `preg_split`, including all it's flags.

The `$pattern` behaves like the patterns of `mb_split`, all other arguments and the return is like preg_split.

### mb_trim
`string mb_trim($string)`

Trims whitespace from both the left and right side of the string.

### mb_ucfirst
`string mb_ucfirst($string[, string $encoding = mb_internal_encoding() ])`

Make a string's first character uppercase.

### mb_ucwords
`string mb_ucwords($string[, string $encoding = mb_internal_encoding() ])`

Uppercase the first character of each word in a string.

