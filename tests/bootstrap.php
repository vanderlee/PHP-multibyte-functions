<?php

if (!class_exists('PHPUnit_Framework_TestCase', false)
    && class_exists('PHPUnit\\Framework\\TestCase')) {
    class_alias('PHPUnit\\Framework\\TestCase', 'PHPUnit_Framework_TestCase');
}

require_once __DIR__ . '/../functions/mb_explode.php';
require_once __DIR__ . '/../functions/mb_trim.php';
require_once __DIR__ . '/../functions/mb_ucfirst.php';
require_once __DIR__ . '/../functions/mb_ucwords.php';
