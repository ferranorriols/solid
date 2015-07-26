<?php

namespace Solid\InterfaceSegregationPrinciple\Solid;

interface LoginMessenger
{
    public function askForPin();
    public function askForCard();
}
