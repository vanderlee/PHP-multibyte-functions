<?php

if (!function_exists('mb_chunk_split')) {
    /**
     * Split a string into fixed-width chunks and append a separator to each.
     *
     * @param string      $string
     * @param int         $length
     * @param string      $separator
     * @param string|null $encoding
     * @return string|false
     */
    function mb_chunk_split($string, $length = 76, $separator = "\r\n", $encoding = null)
    {
        if ($length < 1) {
            trigger_error('mb_chunk_split(): Argument #2 ($length) must be greater than 0', E_USER_WARNING);
            return false;
        }

        if ($string === '') {
            return '';
        }

        $chunks = mb_str_split($string, $length, $encoding);

        return implode($separator, $chunks) . $separator;
    }
}
