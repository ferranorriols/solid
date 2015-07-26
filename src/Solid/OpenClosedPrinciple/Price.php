<?php

namespace Solid\OpenClosedPrinciple;

class Price
{
    protected $total = 0;

    public function add($value)
    {
        $this->total += $value;
    }
}
