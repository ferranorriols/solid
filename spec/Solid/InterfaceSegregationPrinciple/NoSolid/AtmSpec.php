<?php

namespace spec\Solid\InterfaceSegregationPrinciple\NoSolid;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solid\InterfaceSegregationPrinciple\NoSolid\Messenger;

class AtmSpec extends ObjectBehavior
{
    public function it_ask_for_card_and_pin_during_login(Messenger $messenger)
    {
        $this->beConstructedWith($messenger);
        $messenger->askForCard()->shouldBeCalled();
        $messenger->askForPin()->shouldBeCalled();
        $this->login();
    }
}
