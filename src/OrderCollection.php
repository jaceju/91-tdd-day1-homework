<?php

namespace App;

class OrderCollection
{
    /**
     * @var array
     */
    protected $orders = [];

    /**
     * OrderCollection constructor.
     * @param array $orders
     */
    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }

    /**
     * @param $name
     * @return array
     */
    public function getSumList($name)
    {
        $list = [];
        /** @var Order $order */
        foreach ($this->orders as $order) {
            $list[] = $order->sum($name);
        }
        return $list;
    }
}