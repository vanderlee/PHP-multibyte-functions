<?php

if (!function_exists('mb_ucfirst')) {
    /**
     * Make a string's first character title-cased.
     *
     * @param string      $string
     * @param string|null $encoding
     * @return string
     */
    function mb_ucfirst($string, $encoding = null)
    {
        $encoding = _vanderlee_mb_resolve_encoding($encoding);

        if ($string === '') {
            return '';
        }

        return mb_convert_case(mb_substr($string, 0, 1, $encoding), MB_CASE_TITLE, $encoding)
            . mb_substr($string, 1, mb_strlen($string, $encoding), $encoding);
    }
}
