<?php

if (!function_exists('_vanderlee_mb_resolve_encoding')) {
    /**
     * Resolve an optional encoding against mb_internal_encoding().
     *
     * @param string|null $encoding
     * @return string
     */
    function _vanderlee_mb_resolve_encoding($encoding)
    {
        return $encoding === null ? mb_internal_encoding() : $encoding;
    }
}

if (!function_exists('_vanderlee_mb_default_trim_characters')) {
    /**
     * Return the default PHP 8.4 mb_trim character set in the requested encoding.
     *
     * @param string $encoding
     * @return string
     */
    function _vanderlee_mb_default_trim_characters($encoding)
    {
        $characters = " \f\n\r\t\v\0"
            . "\xC2\xA0"
            . "\xE1\x9A\x80"
            . "\xE2\x80\x80\xE2\x80\x81\xE2\x80\x82\xE2\x80\x83"
            . "\xE2\x80\x84\xE2\x80\x85\xE2\x80\x86\xE2\x80\x87"
            . "\xE2\x80\x88\xE2\x80\x89\xE2\x80\x8A"
            . "\xE2\x80\xA8\xE2\x80\xA9\xE2\x80\xAF"
            . "\xE2\x81\x9F"
            . "\xE3\x80\x80"
            . "\xC2\x85"
            . "\xE1\xA0\x8E";

        if (strtoupper($encoding) !== 'UTF-8' && strtoupper($encoding) !== 'UTF8') {
            return mb_convert_encoding($characters, $encoding, 'UTF-8');
        }

        return $characters;
    }
}

if (!function_exists('_vanderlee_mb_character_map')) {
    /**
     * Convert a string of characters to a lookup map.
     *
     * @param string $characters
     * @param string $encoding
     * @return array
     */
    function _vanderlee_mb_character_map($characters, $encoding)
    {
        $map = array();
        $length = mb_strlen($characters, $encoding);

        for ($index = 0; $index < $length; ++$index) {
            $map[mb_substr($characters, $index, 1, $encoding)] = true;
        }

        return $map;
    }
}

if (!function_exists('_vanderlee_mb_trim_impl')) {
    /**
     * Shared implementation for mb_trim(), mb_ltrim(), and mb_rtrim().
     *
     * @param string      $string
     * @param string|null $characters
     * @param string|null $encoding
     * @param bool        $trimLeft
     * @param bool        $trimRight
     * @return string
     */
    function _vanderlee_mb_trim_impl($string, $characters, $encoding, $trimLeft, $trimRight)
    {
        $encoding = _vanderlee_mb_resolve_encoding($encoding);
        if ($characters === null) {
            $characters = _vanderlee_mb_default_trim_characters($encoding);
        }

        if ($characters === '' || $string === '') {
            return $string;
        }

        $characterMap = _vanderlee_mb_character_map($characters, $encoding);
        $start = 0;
        $end = mb_strlen($string, $encoding);

        if ($trimLeft) {
            while ($start < $end) {
                $character = mb_substr($string, $start, 1, $encoding);
                if (!isset($characterMap[$character])) {
                    break;
                }
                ++$start;
            }
        }

        if ($trimRight) {
            while ($end > $start) {
                $character = mb_substr($string, $end - 1, 1, $encoding);
                if (!isset($characterMap[$character])) {
                    break;
                }
                --$end;
            }
        }

        return $end === $start
            ? ''
            : mb_substr($string, $start, $end - $start, $encoding);
    }
}
