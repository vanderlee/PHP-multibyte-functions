<?php

if (!function_exists('mb_strrev')) {
    /**
     * Reverse a string by characters rather than bytes.
     *
     * @param string      $string
     * @param string|null $encoding
     * @return string
     */
    function mb_strrev($string, $encoding = null)
    {
        $encoding = _vanderlee_mb_resolve_encoding($encoding);
        $result = '';

        for ($index = mb_strlen($string, $encoding) - 1; $index >= 0; --$index) {
            $result .= mb_substr($string, $index, 1, $encoding);
        }

        return $result;
    }
}
