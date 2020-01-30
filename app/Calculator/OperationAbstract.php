<?php

namespace App\Calculator;

abstract class OperationAbstract
{
    protected $operands;

    public function setOperands(array $operands)
    {
        $this->operands = array_filter($operands);
    }
}
