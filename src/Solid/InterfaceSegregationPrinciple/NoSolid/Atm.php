<?php

namespace Solid\InterfaceSegregationPrinciple\NoSolid;

class Atm
{
    public function __construct(Messenger $messenger)
    {
        $this->messenger = $messenger;
    }

    public function login()
    {
        $this->messenger->askForCard();
        $this->messenger->askForPin();
    }
}
