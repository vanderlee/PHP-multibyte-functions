<?php

/**
 * Strip whitespace (or other characters) from the beginning and end of a string
 * @param string $string
 * @return string
 */
function mb_trim($string)
{
	return mb_ereg_replace('^\s*([\s\S]*?)\s*$', '\1', $string);
}
