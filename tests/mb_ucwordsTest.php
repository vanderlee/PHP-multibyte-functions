<?php

class mb_ucwordsTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @covers mb_ucwords
	 * @group  multibyte
	 */
	public function testCapitals()
	{
		$this->assertSame('Abc', mb_ucwords('abc'));
		$this->assertSame('ABC', mb_ucwords('ABC'));
		$this->assertSame('AbC', mb_ucwords('AbC'));
		$this->assertSame('ABc', mb_ucwords('aBc'));
		$this->assertSame('Abc Def', mb_ucwords('abc def'));
		$this->assertSame('Abc Def', mb_ucwords('Abc Def'));
	}

	/**
	 * @covers mb_ucwords
	 * @group  multibyte
	 */
	public function testSpaces()
	{
		$this->assertSame('Abc', mb_ucwords('abc'));
		$this->assertSame(' Abc ', mb_ucwords(' abc '));
		$this->assertSame(' Abc Def ', mb_ucwords(' abc def '));
		$this->assertSame("\r\n\t \vAbc\r\n\t \vDef\r\n\t \v", mb_ucwords("\r\n\t \vabc\r\n\t \vdef\r\n\t \v"));
	}

	/**
	 * @covers mb_ucwords
	 * @group  multibyte
	 */
	public function testUtf8()
	{
		$this->assertSame('Άξιον Εστί', mb_ucwords('άξιον εστί', 'utf-8'));
		$this->assertSame('Берегу Пустынных', mb_ucwords('берегу пустынных', 'utf-8'));
		$this->assertSame('Sîne Klâwen', mb_ucwords('sîne klâwen', 'utf-8'));
		$this->assertSame('Ĳs Vrĳ', mb_ucwords('ĳs vrĳ', 'utf-8'));
		$this->assertSame('Señor Goméz', mb_ucwords('señor goméz'));
	}

}
