<?php

if (!function_exists('mb_ltrim')) {
    /**
     * Strip whitespace or specified characters from the beginning of a string.
     *
     * @param string      $string
     * @param string|null $characters
     * @param string|null $encoding
     * @return string
     */
    function mb_ltrim($string, $characters = null, $encoding = null)
    {
        return _vanderlee_mb_trim_impl($string, $characters, $encoding, true, false);
    }
}
