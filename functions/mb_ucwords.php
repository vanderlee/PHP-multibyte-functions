<?php

/**
 * Uppercase the first character of each word in a string
 * @param string $string
 * @param string $encoding
 * @return string
 */
function mb_ucwords($string, $encoding = null)
{
	if (!$encoding) {
		$encoding = mb_internal_encoding();
	}

	mb_regex_encoding($encoding);
	mb_ereg_search_init($string, '(\S)(\S*\s*)|(\s+)');
	$output = '';
	while ($match = mb_ereg_search_regs()) {
		$output .= $match[3] ? $match[3] : mb_strtoupper($match[1], $encoding) . $match[2];
	}

	return $output;
}
