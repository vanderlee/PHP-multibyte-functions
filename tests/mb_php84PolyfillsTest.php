<?php

class mb_php84PolyfillsTest extends PHPUnit_Framework_TestCase
{
    public function testFunctionsAreAvailable()
    {
        $this->assertTrue(function_exists('mb_trim'));
        $this->assertTrue(function_exists('mb_ltrim'));
        $this->assertTrue(function_exists('mb_rtrim'));
        $this->assertTrue(function_exists('mb_ucfirst'));
        $this->assertTrue(function_exists('mb_lcfirst'));
    }

    public function testDefaultUnicodeWhitespaceIsTrimmed()
    {
        $value = "\xC2\xA0\xE3\x80\x80Άξιον Εστί\xE2\x80\xAF";

        $this->assertSame('Άξιον Εστί', mb_trim($value, null, 'UTF-8'));
        $this->assertSame("Άξιον Εστί\xE2\x80\xAF", mb_ltrim($value, null, 'UTF-8'));
        $this->assertSame("\xC2\xA0\xE3\x80\x80Άξιον Εστί", mb_rtrim($value, null, 'UTF-8'));
    }

    public function testExplicitMultibyteCharactersAreTrimmed()
    {
        $this->assertSame('value', mb_trim('αβvalueβα', 'αβ', 'UTF-8'));
        $this->assertSame('valueβα', mb_ltrim('αβvalueβα', 'αβ', 'UTF-8'));
        $this->assertSame('αβvalue', mb_rtrim('αβvalueβα', 'αβ', 'UTF-8'));
    }

    public function testEmptyCharacterListDoesNotTrim()
    {
        $this->assertSame(' value ', mb_trim(' value ', '', 'UTF-8'));
    }

    public function testFirstCharacterCaseConversion()
    {
        $this->assertSame('Élan', mb_ucfirst('élan', 'UTF-8'));
        $this->assertSame('éLAN', mb_lcfirst('ÉLAN', 'UTF-8'));
        $this->assertSame('', mb_ucfirst('', 'UTF-8'));
        $this->assertSame('', mb_lcfirst('', 'UTF-8'));
    }
}
