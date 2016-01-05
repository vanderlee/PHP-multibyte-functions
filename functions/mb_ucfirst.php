<?php

/**
 * Make a string's first character uppercase
 * @param string $string
 * @param string $encoding
 * @return string
 */
function mb_ucfirst($string, $encoding = null)
{
	if (!$encoding) {
		$encoding = mb_internal_encoding();
	}

	return mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding)
			. mb_substr($string, 1, mb_strlen($string, $encoding) - 1, $encoding);
}
