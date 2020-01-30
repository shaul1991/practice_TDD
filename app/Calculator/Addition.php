<?php


namespace App\Calculator;


use App\Calculator\Exception\NoOpperandsException;

class Addition implements OperationInterface
{
    protected $operands;

    public function setOperands(array $operands)
    {
        $this->operands = array_filter($operands);
    }

    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOpperandsException();
        }

        return array_sum($this->operands);
    }
}