<?php

if (!function_exists('mb_trim')) {
    /**
     * Strip whitespace or specified characters from both ends of a string.
     *
     * @param string      $string
     * @param string|null $characters
     * @param string|null $encoding
     * @return string
     */
    function mb_trim($string, $characters = null, $encoding = null)
    {
        return _vanderlee_mb_trim_impl($string, $characters, $encoding, true, true);
    }
}
