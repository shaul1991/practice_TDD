<?php


namespace unit\calculator;

use App\Calculator\Addition;
use App\Calculator\Exception\NoOpperandsException;
use PHPUnit\Framework\TestCase;

class AdditionTeest extends TestCase
{
    /** @test */
    public function addsUpGivenOperands()
    {
        $addition = new Addition();
        $addition->setOperands([5, 10]);

        $this->assertEquals(15, $addition->calculate());
    }

    /** @test */
    public function noOperandsGivenThrowsExceptionWhenCalculating()
    {
        $this->expectException(NoOpperandsException::class);

        $addition = new Addition();
        $addition->calculate();
    }
}