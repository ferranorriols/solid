<?php

namespace Solid\OpenClosedPrinciple;

class NoSolidBasket
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @var bool
     */
    protected $isCredit;

    /**
     * @param Factory\Payment $factory
     * @param array           $items
     * @param bool            $isCredit
     */
    public function __construct(Factory\Payment $factory, array $items, $isCredit)
    {
        $this->factory = $factory;
        $this->isCredit = $isCredit;
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
        $payment = $this->isCredit ? $this->factory->getCredit() : $this->factory->getCash();
        $processor->pay($payment);
    }
}
