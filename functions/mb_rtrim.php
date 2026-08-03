<?php

if (!function_exists('mb_rtrim')) {
    /**
     * Strip whitespace or specified characters from the end of a string.
     *
     * @param string      $string
     * @param string|null $characters
     * @param string|null $encoding
     * @return string
     */
    function mb_rtrim($string, $characters = null, $encoding = null)
    {
        return _vanderlee_mb_trim_impl($string, $characters, $encoding, false, true);
    }
}
