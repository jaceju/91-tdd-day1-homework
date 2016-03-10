<?php

namespace App\DivideRule;

use App\DivideRule;
use App\Order;

class DividedByNum implements DivideRule
{
    /**
     * @var int
     */
    private $divisor;

    /**
     * DividedByNum constructor.
     * @param int $divisor
     */
    public function __construct($divisor)
    {
        $this->divisor = $divisor;
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function divide(Order $order)
    {
        $orderItemsList = array_chunk($order->getItems(), $this->divisor);
        $orders = [];
        foreach ($orderItemsList as $orderItems) {
            $orders[] = new Order($orderItems);
        }
        return $orders;
    }
}