<?php

class mb_ucfirstTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @covers mb_ucfirst
	 * @group  multibyte
	 */
	public function testCapitals()
	{
		$this->assertSame('Abc', mb_ucfirst('abc'));
		$this->assertSame('ABC', mb_ucfirst('ABC'));
		$this->assertSame('AbC', mb_ucfirst('AbC'));
		$this->assertSame('ABc', mb_ucfirst('aBc'));
		$this->assertSame('Abc def', mb_ucfirst('abc def'));
		$this->assertSame('Abc Def', mb_ucfirst('Abc Def'));
	}

	/**
	 * @covers mb_ucwords
	 * @group  multibyte
	 */
	public function testSpaces()
	{
		$this->assertSame('Abc', mb_ucfirst('abc'));
		$this->assertSame(' abc ', mb_ucfirst(' abc '));	// yes, this is like ucfirst!
		$this->assertSame('Abc ', mb_ucfirst('abc '));
		$this->assertSame('Abc def ', mb_ucfirst('abc def '));
		$this->assertSame("Abc\r\n\t \vdef\r\n\t \v", mb_ucfirst("abc\r\n\t \vdef\r\n\t \v"));
	}

	/**
	 * @covers mb_ucfirst
	 * @group  multibyte
	 */
	public function testUtf8()
	{
		$this->assertSame('Άξιον εστί', mb_ucfirst('άξιον εστί', 'utf-8'));
		$this->assertSame('Берегу пустынных', mb_ucfirst('берегу пустынных', 'utf-8'));
		$this->assertSame('Sîne klâwen', mb_ucfirst('sîne klâwen', 'utf-8'));
		$this->assertSame('Ĳs vrĳ', mb_ucfirst('ĳs vrĳ', 'utf-8'));
		$this->assertSame('Señor goméz', mb_ucfirst('señor goméz'));
	}

}
