<?php


namespace unit\calculator;


use App\Calculator\Divistion;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    /** @test */
    public function dividesGivenOperands()
    {
        $division = new Divistion();
        $division->setOperands([100, 0, 2]);

        $this->assertEquals(50, $division->calculate());
    }
}