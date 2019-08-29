<?php

namespace Czechphp\ICOValidator\Tests;

use Czechphp\ICOValidator\ICOValidator;
use PHPUnit\Framework\TestCase;

class ICOValidatorTest extends TestCase
{
    /**
     * @dataProvider validProvider
     *
     * @param string $value
     */
    public function testValid(string $value)
    {
        $this->assertSame(ICOValidator::ERROR_NONE, ICOValidator::validate($value));
    }

    /**
     * @return array
     */
    public function validProvider()
    {
        return [
            ['25596641'], // modulo 0
            ['61672190'], // modulo 1
            ['48118664'], // modulo 7
            // random numbers
            ['00064581'],
            ['45274649'],
            ['00002593'],
            ['00005886'],
            ['70994226'],
            ['16192800'],
        ];
    }

    public function testTooLong()
    {
        $this->assertSame(ICOValidator::ERROR_FORMAT, ICOValidator::validate('12345678901'));
    }

    public function testInvalidCharacter()
    {
        $this->assertSame(ICOValidator::ERROR_FORMAT, ICOValidator::validate('foo'));
    }

    public function testModulo()
    {
        $this->assertSame(ICOValidator::ERROR_MODULO, ICOValidator::validate('00000005'));
    }
}
