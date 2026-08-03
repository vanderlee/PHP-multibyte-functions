<?php

if (!function_exists('mb_str_split')) {
    /**
     * Split a string into chunks measured in characters.
     *
     * @param string      $string
     * @param int         $length
     * @param string|null $encoding
     * @return array|false
     */
    function mb_str_split($string, $length = 1, $encoding = null)
    {
        if ($length < 1) {
            trigger_error('mb_str_split(): Argument #2 ($length) must be greater than 0', E_USER_WARNING);
            return false;
        }

        $encoding = _vanderlee_mb_resolve_encoding($encoding);
        $stringLength = mb_strlen($string, $encoding);
        $parts = array();

        for ($offset = 0; $offset < $stringLength; $offset += $length) {
            $parts[] = mb_substr($string, $offset, $length, $encoding);
        }

        return $parts;
    }
}
