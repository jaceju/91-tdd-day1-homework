<?php

namespace App;

class OrderDivider
{
    /**
     * @var DivideRule
     */
    private $rule;

    /**
     * OrderDivider constructor.
     * @param DivideRule $rule
     */
    public function __construct(DivideRule $rule)
    {
        $this->rule = $rule;
    }

    /**
     * @param $order
     * @return OrderCollection
     */
    public function splitOrder(Order $order)
    {
        $orders = $this->rule->divide($order);
        return new OrderCollection($orders);
    }
}