<?php

namespace Solid\InterfaceSegregationPrinciple\Solid;

class Atm
{
    public function __construct(LoginMessenger $messenger)
    {
        $this->messenger = $messenger;
    }

    public function login()
    {
        $this->messenger->askForCard();
        $this->messenger->askForPin();
    }

}