<?php
declare(strict_types=1);

namespace tests\Slots\Finance;

use App\Slots\Finance\Calculator\Calculator;
use \PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculateOneLine(): void
    {
        $lines = [
            [
                'line' => [
                    'id' => 3,
                    'tile' => 4,
                    'count' => 3,
                    'ratio' => 40,
                ]
            ]
        ];

        $expectedProfit = 4;

        $calculator = new Calculator($lines);

        $this->assertEquals($expectedProfit, $calculator->calculate());
    }

    public function testCalculateSeveralLines(): void
    {
        $lines = [
            [
                'line' => [
                    'id' => 3,
                    'tile' => 4,
                    'count' => 3,
                    'ratio' => 40,
                ]
            ],
            [
                'line' => [
                    'id' => 4,
                    'tile' => 4,
                    'count' => 3,
                    'ratio' => 40,
                ]
            ],
            [
                'line' => [
                    'id' => 3,
                    'tile' => 1,
                    'count' => 3,
                    'ratio' => 100,
                ]
            ]
        ];

        $expectedProfit = 18;

        $calculator = new Calculator($lines);

        $this->assertEquals($expectedProfit, $calculator->calculate());
    }
}
