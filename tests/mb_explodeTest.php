<?php

class mb_explodeTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregBasic() {
		$this->assertSame(preg_split('/x/', ''), mb_explode('x', ''));
		$this->assertSame(preg_split('/x/', '1'), mb_explode('x', '1'));
		$this->assertSame(preg_split('/x/', 'x'), mb_explode('x', 'x'));
		$this->assertSame(preg_split('/x/', 'xx'), mb_explode('x', 'xx'));
		$this->assertSame(preg_split('/x/', '1x2x3'), mb_explode('x', '1x2x3'));
		$this->assertSame(preg_split('/x/', '1x2x'), mb_explode('x', '1x2x'));
		$this->assertSame(preg_split('/x/', 'x2x3'), mb_explode('x', 'x2x3'));
		$this->assertSame(preg_split('/x/', 'x2x'), mb_explode('x', 'x2x'));
		$this->assertSame(preg_split('/x/', '11x22x33'), mb_explode('x', '11x22x33'));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregUtf8() {
		$this->assertSame(array('από τ', ' Άξι', 'ν Εστί'), mb_explode('ο', 'από το Άξιον Εστί')); // Issue with PHP 5.6
		$this->assertSame(array('На берег', ' п', 'стынных волн'), mb_explode('у', 'На берегу пустынных волн'));
		$this->assertSame(array('Sîn', ' klâw', 'n durh di', ' wolk', 'n'), mb_explode('e', 'Sîne klâwen durh die wolken'));
		$this->assertSame(array('doe', ' mĳ nie', 's'), mb_explode('t', 'doet mĳ niets'));
	}
	
	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregLimit() {
		$flags = 0;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));	
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregCapture() {
		$flags = PREG_SPLIT_DELIM_CAPTURE;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));		
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregNoEmpty() {
		$flags = PREG_SPLIT_NO_EMPTY;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregOffset() {
		$flags = PREG_SPLIT_OFFSET_CAPTURE;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregCaptureOffset() {
		$flags = PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_OFFSET_CAPTURE;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregOffsetNoEmpty() {
		$flags = PREG_SPLIT_NO_EMPTY | PREG_SPLIT_OFFSET_CAPTURE;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregAllFlags() {
		$flags = PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY | PREG_SPLIT_OFFSET_CAPTURE;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testPregCaptureNoEmpty() {
		$flags = PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY;
		
		$this->assertSame(preg_split('/x/', '1x2x3', -1, $flags), mb_explode('x', '1x2x3', -1, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 0, $flags), mb_explode('x', '1x2x3', 0, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', null, $flags), mb_explode('x', '1x2x3', null, $flags));
		
		$this->assertSame(preg_split('/x/', '1', 2, $flags), mb_explode('x', '1', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x', 2, $flags), mb_explode('x', 'x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'xx', 2, $flags), mb_explode('x', 'xx', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x3', 2, $flags), mb_explode('x', '1x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', '1x2x', 2, $flags), mb_explode('x', '1x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x3', 2, $flags), mb_explode('x', 'x2x3', 2, $flags));
		$this->assertSame(preg_split('/x/', 'x2x', 2, $flags), mb_explode('x', 'x2x', 2, $flags));
		$this->assertSame(preg_split('/x/', '11x22x33', 2, $flags), mb_explode('x', '11x22x33', 2, $flags));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testNewlineEmpty() {
		$flags = PREG_SPLIT_DELIM_CAPTURE;
		
		$this->assertSame(array('a', 'b'), mb_explode('\r\n|\r|\n', "a\nb", -1, $flags));
		$this->assertSame(array('a', "\n", 'b'), mb_explode('(\r\n|\r|\n)', "a\nb", -1, $flags));
		$this->assertSame(array('a', "\r\n", 'b'), mb_explode('(\r\n|\r|\n)', "a\r\nb", -1, $flags));
		$this->assertSame(array('a', "\r", 'b'), mb_explode('(\r\n|\r|\n)', "a\rb", -1, $flags));
		$this->assertSame(array('a', "\n", '', "\r", 'b'), mb_explode('(\r\n|\r|\n)', "a\n\rb", -1, $flags));
		$this->assertSame(preg_split('~(\r\n|\r|\n)~', "a\n\rb", -1, $flags), mb_explode('(\r\n|\r|\n)', "a\n\rb", -1, $flags));
	}

	/**
	 * @covers mb_explode
	 * @group  multibyte
	 */
	public function testNewlineNoEmpty() {
		$flags = PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY;
		
		$this->assertSame(array('a', "\n", "\r", 'b'), mb_explode('(\r\n|\r|\n)', "a\n\rb", -1, $flags));
		$this->assertSame(preg_split('~(\r\n|\r|\n)~', "a\n\rb", -1, $flags), mb_explode('(\r\n|\r|\n)', "a\n\rb", -1, $flags));
	}
}
