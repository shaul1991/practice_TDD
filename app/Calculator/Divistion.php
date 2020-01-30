<?php


namespace App\Calculator;


use App\Calculator\Exception\NoOpperandsException;

class Divistion extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOpperandsException();
        }

        return array_reduce(
            $this->operands,
            function ($a, $b) {
                if ($a !== null && $b !== null) {
                    return $a / $b;
                }

                return $b;
            },
            null
        );
    }
}