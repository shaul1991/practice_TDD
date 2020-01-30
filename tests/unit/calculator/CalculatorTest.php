<?php


namespace unit\calculator;

use App\Calculator\Addition;
use App\Calculator\Calculator;
use App\Calculator\Divistion;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function canSetSingleOperation()
    {
        $addition = new Addition();
        $addition->setOperands([5, 10]);

        $calculator = new Calculator();
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function canSetMultipleOperation()
    {
        $addition1 = new Addition();
        $addition1->setOperands([5, 10]);

        $addition2 = new Addition();
        $addition2->setOperands([2, 2]);

        $calculator = new Calculator();
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function operationAreIgnoredIfNotInstanceOfOperationInterface()
    {
        $addition = new Addition();
        $addition->setOperands([5, 10]);

        $calculator = new Calculator();
        $calculator->setOperations([$addition, 'cats', 'dogs']);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function canCalculateResult()
    {
        $addition = new Addition();
        $addition->setOperands([5, 10]);

        $calculator = new Calculator();
        $calculator->setOperation($addition);

        $this->assertEquals(15, $calculator->calculate());
    }

    /** @test */
    public function calculateMethodReturnsMultipleResults()
    {
        $addition = new Addition();
        $addition->setOperands([5, 10]);

        $division = new Divistion();
        $division->setOperands([50, 0, 2]);

        $calculator = new Calculator();
        $calculator->setOperations([$addition, $division]);

        $this->assertIsArray($calculator->calculate());
        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(25, $calculator->calculate()[1]);
    }
}