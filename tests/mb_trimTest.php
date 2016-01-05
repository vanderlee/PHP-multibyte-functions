<?php

class mb_trimTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers mb_trim
	 * @group  multibyte
	 */
	public function testTrim() {
		$this->assertSame('abc', mb_trim("abc"));
		$this->assertSame('abc', mb_trim("\n\t\r abc"));
		$this->assertSame('abc', mb_trim("abc\n\t\r "));
		$this->assertSame('abc', mb_trim("\n\t\r abc\n\t\r "));
		$this->assertSame("a\n\t\r c", mb_trim("\n\t\r a\n\t\r c\n\t\r "));
	}

	/**
	 * @covers mb_trim
	 * @group  multibyte
	 */
	public function testTrimUtf8() {
		$this->assertSame('Άξιον Εστί', mb_trim(' Άξιον Εστί '));
		$this->assertSame('берегу пустынных', mb_trim(' берегу пустынных '));
		$this->assertSame('Sîne klâwen', mb_trim(' Sîne klâwen '));
		$this->assertSame('ĳs vrĳ', mb_trim(' ĳs vrĳ '));
	}
}
