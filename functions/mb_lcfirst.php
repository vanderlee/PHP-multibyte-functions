<?php

if (!function_exists('mb_lcfirst')) {
    /**
     * Make a string's first character lowercase.
     *
     * @param string      $string
     * @param string|null $encoding
     * @return string
     */
    function mb_lcfirst($string, $encoding = null)
    {
        $encoding = _vanderlee_mb_resolve_encoding($encoding);

        if ($string === '') {
            return '';
        }

        return mb_strtolower(mb_substr($string, 0, 1, $encoding), $encoding)
            . mb_substr($string, 1, mb_strlen($string, $encoding), $encoding);
    }
}
