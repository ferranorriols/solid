<?php

namespace Solid\InterfaceSegregationPrinciple\NoSolid;

interface Messenger
{
    public function askForCard();
    public function askForPin();
    public function askForAccount();
    public function askForAmmount();
    public function tellNoMoney();
    public function tellMachineEmpty();
}
