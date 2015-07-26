<?php

namespace spec\Solid\OpenClosedPrinciple;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solid\OpenClosedPrinciple\Factory;
use Solid\OpenClosedPrinciple\Item;
use Solid\OpenClosedPrinciple\Payment\PaymentInterface;
use Solid\OpenClosedPrinciple\Processor;

class SolidBasketSpec extends ObjectBehavior
{
    public function it_checkouts_a_payment(
        Factory\Payment $paymentFactory,
        Item $item1,
        Item $item2,
        PaymentInterface $paymentInterface,
        Processor $processor
    ) {
        $this->beConstructedWith($paymentFactory, [$item1, $item2], $paymentInterface);
        $item1->getPrice()->willReturn(100);
        $item2->getPrice()->willReturn(200);
        $processor->add(100)->shouldBeCalled();
        $processor->add(200)->shouldBeCalled();
        $processor->pay($paymentInterface)->shouldBeCalled();

        $this->checkout($processor);
    }
}
