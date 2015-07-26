<?php

namespace spec\Solid\OpenClosedPrinciple;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solid\OpenClosedPrinciple\Payment\Cash;
use Solid\OpenClosedPrinciple\Payment\Credit;
use Solid\OpenClosedPrinciple\Factory\Payment;
use Solid\OpenClosedPrinciple\Item;
use Solid\OpenClosedPrinciple\Processor;

class NoSolidBasketSpec extends ObjectBehavior
{
    public function it_checkouts_a_cash_order(
        Payment $payment,
        Processor $processor,
        Item $item1,
        Item $item2,
        Cash $cash
    ) {
        $this->beConstructedWith($payment, [$item1, $item2], false);
        $item1->getPrice()->willReturn(100);
        $item2->getPrice()->willReturn(200);
        $processor->add(100)->shouldBeCalled();
        $processor->add(200)->shouldBeCalled();
        $payment->getCash()->willReturn($cash);
        $processor->pay($cash)->shouldBeCalled();

        $this->checkout($processor);
    }

    public function it_checkouts_a_credit_order(
        Payment $payment,
        Processor $processor,
        Item $item1,
        Item $item2,
        Credit $credit
    ) {
        $this->beConstructedWith($payment, [$item1, $item2], true);
        $item1->getPrice()->willReturn(100);
        $item2->getPrice()->willReturn(200);
        $processor->add(100)->shouldBeCalled();
        $processor->add(200)->shouldBeCalled();
        $payment->getCredit()->willReturn($credit);
        $processor->pay($credit)->shouldBeCalled();

        $this->checkout($processor);
    }
}
