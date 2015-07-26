<?php

namespace Solid\OpenClosedPrinciple\Factory;

use Solid\OpenClosedPrinciple\Payment\Cash;
use Solid\OpenClosedPrinciple\Payment\Credit;

class Payment
{
    public function getCash()
    {
        return new Cash();
    }

    public function getCredit()
    {
        return new Credit();
    }
}
