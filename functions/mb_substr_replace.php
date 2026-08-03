<?php

if (!function_exists('mb_substr_replace')) {
    /**
     * Replace a character range within a multibyte string.
     *
     * @param string      $string
     * @param string      $replacement
     * @param int         $start
     * @param int|null    $length
     * @param string|null $encoding
     * @return string
     */
    function mb_substr_replace($string, $replacement, $start, $length = null, $encoding = null)
    {
        $encoding = _vanderlee_mb_resolve_encoding($encoding);
        $stringLength = mb_strlen($string, $encoding);

        if ($start < 0) {
            $start = max(0, $stringLength + $start);
        } else {
            $start = min($start, $stringLength);
        }

        if ($length === null) {
            $end = $stringLength;
        } elseif ($length < 0) {
            $end = max($start, $stringLength + $length);
        } else {
            $end = min($stringLength, $start + $length);
        }

        return mb_substr($string, 0, $start, $encoding)
            . $replacement
            . mb_substr($string, $end, $stringLength - $end, $encoding);
    }
}
