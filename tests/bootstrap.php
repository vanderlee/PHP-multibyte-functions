<?php

mb_internal_encoding('UTF-8');

if (!class_exists('PHPUnit_Framework_TestCase', false)) {
    class_exists('PHPUnit\\Framework\\TestCase');

    if (!class_exists('PHPUnit_Framework_TestCase', false)) {
        class_alias('PHPUnit\\Framework\\TestCase', 'PHPUnit_Framework_TestCase');
    }
}

require_once __DIR__ . '/../functions/mb_polyfill_helpers.php';
require_once __DIR__ . '/../functions/mb_explode.php';
require_once __DIR__ . '/../functions/mb_trim.php';
require_once __DIR__ . '/../functions/mb_ltrim.php';
require_once __DIR__ . '/../functions/mb_rtrim.php';
require_once __DIR__ . '/../functions/mb_ucfirst.php';
require_once __DIR__ . '/../functions/mb_lcfirst.php';
require_once __DIR__ . '/../functions/mb_ucwords.php';
require_once __DIR__ . '/../functions/mb_str_split.php';
require_once __DIR__ . '/../functions/mb_str_pad.php';
require_once __DIR__ . '/../functions/mb_strrev.php';
require_once __DIR__ . '/../functions/mb_substr_replace.php';
require_once __DIR__ . '/../functions/mb_chunk_split.php';
