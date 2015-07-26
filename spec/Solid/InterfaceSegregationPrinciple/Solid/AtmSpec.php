<?php

namespace spec\Solid\InterfaceSegregationPrinciple\Solid;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solid\InterfaceSegregationPrinciple\Solid\LoginMessenger;

class AtmSpec extends ObjectBehavior
{
    public function it_ask_for_card_and_pin_during_login(LoginMessenger $messenger)
    {
        $this->beConstructedWith($messenger);
        $messenger->askForCard()->shouldBeCalled();
        $messenger->askForPin()->shouldBeCalled();
        $this->login();
    }
}
