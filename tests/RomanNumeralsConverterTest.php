<?php

declare(strict_types=1);

namespace App\Tests;

use App\RomanNumeralsConverter;
use Assert\AssertionFailedException;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class RomanNumeralsConverterTest extends TestCase
{
    /**
     * @test
     * @dataProvider numeralProvider
     */
    public function it_converts_a_number(int $number, string $expected): void
    {
        Assert::assertSame(
            $expected,
            RomanNumeralsConverter::convert($number)
        );
    }

    public function numeralProvider(): array
    {
        return [
            1 => [
                'number' => 1,
                'expected' => 'I',
            ],
            2 => [
                'number' => 2,
                'expected' => 'II',
            ],
            3 => [
                'number' => 3,
                'expected' => 'III',
            ],
            4 => [
                'number' => 4,
                'expected' => 'IV',
            ],
            5 => [
                'number' => 5,
                'expected' => 'V',
            ],
            9 => [
                'number' => 9,
                'expected' => 'IX',
            ],
            10 => [
                'number' => 10,
                'expected' => 'X',
            ],
            15 => [
                'number' => 15,
                'expected' => 'XV',
            ],
            19 => [
                'number' => 19,
                'expected' => 'XIX',
            ],
            20 => [
                'number' => 20,
                'expected' => 'XX',
            ],
            21 => [
                'number' => 21,
                'expected' => 'XXI',
            ],
            40 => [
                'number' => 40,
                'expected' => 'XL',
            ],
            50 => [
                'number' => 50,
                'expected' => 'L',
            ],
            80 => [
                'number' => 80,
                'expected' => 'LXXX',
            ],
            90 => [
                'number' => 90,
                'expected' => 'XC',
            ],
            100 => [
                'number' => 100,
                'expected' => 'C',
            ],
            110 => [
                'number' => 110,
                'expected' => 'CX',
            ],
            400 => [
                'number' => 400,
                'expected' => 'CD',
            ],
            500 => [
                'number' => 500,
                'expected' => 'D',
            ],
            700 => [
                'number' => 700,
                'expected' => 'DCC',
            ],
            900 => [
                'number' => 900,
                'expected' => 'CM',
            ],
            1000 => [
                'number' => 1000,
                'expected' => 'M',
            ],
            1986 => [
                'number' => 1986,
                'expected' => 'MCMLXXXVI',
            ],
            1990 => [
                'number' => 1990,
                'expected' => 'MCMXC',
            ],
            2020 => [
                'number' => 2020,
                'expected' => 'MMXX',
            ],
        ];
    }

    /**
     * @test
     */
    public function it_cannot_convert_negative_numbers(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Cannot convert negative numbers');

        RomanNumeralsConverter::convert(-1);
    }
}
