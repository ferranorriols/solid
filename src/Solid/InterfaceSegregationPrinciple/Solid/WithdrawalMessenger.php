<?php

namespace Solid\InterfaceSegregationPrinciple\Solid;

interface WithdrawalMessenger
{
    public function tellNoMoney();
    public function tellMachineEmpty();
}
