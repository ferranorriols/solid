<?php

namespace Solid\OpenClosedPrinciple;

use Solid\OpenClosedPrinciple\Payment\PaymentInterface;

class SolidBasket
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @var bool
     */
    protected $payment;

    /**
     * @var Factory\Payment
     */
    protected $factory;

    /**
     * @param Factory\Payment  $factory
     * @param array            $items
     * @param PaymentInterface $payment
     */
    public function __construct(Factory\Payment $factory, array $items, PaymentInterface $payment)
    {
        $this->factory = $factory;
        $this->payment = $payment;
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Processor $processor
     */
    public function checkout(Processor $processor)
    {
        foreach ($this->getItems() as $item) {
            $processor->add($item->getPrice());
        }
        $processor->pay($this->payment);
    }
}
