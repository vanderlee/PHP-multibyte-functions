<?php

	function mb_trim($str) {
		return mb_ereg_replace('^\s*([\s\S]*?)\s*$', '\1', $str);
	}
