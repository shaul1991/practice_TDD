<?php


namespace App\Calculator;


use App\Calculator\Exception\NoOpperandsException;

class Addition extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOpperandsException();
        }

        return array_sum($this->operands);
    }
}