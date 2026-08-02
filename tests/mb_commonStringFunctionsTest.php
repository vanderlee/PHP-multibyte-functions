<?php

class mb_commonStringFunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testStrSplitUsesCharacterLengths()
    {
        $this->assertSame(array('Άξ', 'ιο', 'ν'), mb_str_split('Άξιον', 2, 'UTF-8'));
        $this->assertSame(array(), mb_str_split('', 2, 'UTF-8'));
    }

    public function testStrPadUsesCharacterLengths()
    {
        $this->assertSame('▶▶❤❓❇❤', mb_str_pad('▶▶', 6, '❤❓❇', STR_PAD_RIGHT, 'UTF-8'));
        $this->assertSame('❤❓❇❤▶▶', mb_str_pad('▶▶', 6, '❤❓❇', STR_PAD_LEFT, 'UTF-8'));
        $this->assertSame('❤❓▶▶❤❓', mb_str_pad('▶▶', 6, '❤❓❇', STR_PAD_BOTH, 'UTF-8'));
        $this->assertSame('already long', mb_str_pad('already long', 4, '❤', STR_PAD_RIGHT, 'UTF-8'));
    }

    public function testStrrevReversesCharactersNotBytes()
    {
        $this->assertSame('界世 olleH', mb_strrev('Hello 世界', 'UTF-8'));
        $this->assertSame('', mb_strrev('', 'UTF-8'));
    }

    public function testSubstrReplaceSupportsPositiveAndNegativeOffsets()
    {
        $this->assertSame('Καλημέρα κόσμε', mb_substr_replace('Καλημέρα κόσμου', 'ε', -1, 1, 'UTF-8'));
        $this->assertSame('abc世界f', mb_substr_replace('abcdef', '世界', 3, 2, 'UTF-8'));
        $this->assertSame('abXef', mb_substr_replace('abcdef', 'X', 2, -2, 'UTF-8'));
        $this->assertSame('abcX', mb_substr_replace('abcdef', 'X', 3, null, 'UTF-8'));
    }

    public function testChunkSplitUsesCharacterWidths()
    {
        $this->assertSame("Άξ|ιο|ν|", mb_chunk_split('Άξιον', 2, '|', 'UTF-8'));
        $this->assertSame('', mb_chunk_split('', 2, '|', 'UTF-8'));
    }
}
