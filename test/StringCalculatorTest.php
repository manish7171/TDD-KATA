<?php

use App\Models\StringCalculator\StringCalculator;
use PHPUnit\Framework\TestCase as TestCase;

class StringCalculatorTest extends TestCase
{
/*
 * Create a simple String calculator with a method signature:
 *
 * 1. The method can take up to two numbers, separated by commas, and will return their sum.

for example “” or “1” or “1,2” as inputs.

(for an empty string it will return 0)
 * */
    public function commandTurnRightParameters() {
        // test with this values
        return array(
            array('', 0),
            array('1', 1),
            array('1,1', 2),
            array('11,11', 22),
            // ...
        );
    }
    /**
     * @dataProvider commandTurnRightParameters
     * @param $input
     * @param $expectedResult
     */
    public function testShouldReturnZeroForEmptyString($input, $expectedResult)
    {
        $stringCalculator = new StringCalculator();
        self::assertEquals($expectedResult , $stringCalculator->add($input));
    }

    public function testShouldThrowInvalidArgumentException()
    {
        $stringCalculator = new StringCalculator();
        $stringCalculator->add('1,');
        $this->expectException(\Exception::class);
    }

}