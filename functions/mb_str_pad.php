<?php

if (!function_exists('mb_str_pad')) {
    /**
     * Pad a multibyte string to a target character length.
     *
     * @param string      $string
     * @param int         $length
     * @param string      $padString
     * @param int         $padType
     * @param string|null $encoding
     * @return string|false
     */
    function mb_str_pad($string, $length, $padString = ' ', $padType = STR_PAD_RIGHT, $encoding = null)
    {
        $encoding = _vanderlee_mb_resolve_encoding($encoding);
        $stringLength = mb_strlen($string, $encoding);

        if ($length <= $stringLength) {
            return $string;
        }

        if ($padString === '') {
            trigger_error('mb_str_pad(): Argument #3 ($pad_string) must be a non-empty string', E_USER_WARNING);
            return false;
        }

        if ($padType !== STR_PAD_LEFT && $padType !== STR_PAD_RIGHT && $padType !== STR_PAD_BOTH) {
            trigger_error('mb_str_pad(): Argument #4 ($pad_type) must be STR_PAD_LEFT, STR_PAD_RIGHT, or STR_PAD_BOTH', E_USER_WARNING);
            return false;
        }

        $paddingLength = $length - $stringLength;
        $padLength = mb_strlen($padString, $encoding);
        $padding = str_repeat($padString, (int) ceil($paddingLength / $padLength));
        $padding = mb_substr($padding, 0, $paddingLength, $encoding);

        if ($padType === STR_PAD_LEFT) {
            return $padding . $string;
        }

        if ($padType === STR_PAD_RIGHT) {
            return $string . $padding;
        }

        $leftLength = (int) floor($paddingLength / 2);
        $rightLength = $paddingLength - $leftLength;

        return mb_substr($padding, 0, $leftLength, $encoding)
            . $string
            . mb_substr($padding, $leftLength, $rightLength, $encoding);
    }
}
