PHP multibyte functions
========
Version 1.0
[![Build Status](https://travis-ci.org/vanderlee/PHP-multibyte-functions.svg)](https://travis-ci.org/vanderlee/PHP-multibyte-functions)

Copyright &copy; 2015 Martijn van der Lee.
MIT Open Source license applies.

Introduction
------------
This is just a collection of multibyte (mb_*) functions to augment the builtin
functions.

Unittests included.

Methods
-------
### ***`string`*** `trim(`***`string`*** `$str)`
Trims whitespace from both the left and right side of the string.

### ***`array`*** `mb_explode(`***`string`*** `$pattern, `***`string`*** `$subject, `***`integer`*** `$limit = -1, `***`integer`*** `$flags = 0)`
Multibyte version of `preg_split`, including all it's flags.

The `$pattern` behaves like the patterns of `mb_split`, all other arguments and the return is like preg_split.