<?php

namespace App;

class Order
{
    /**
     * @var array
     */
    private $items;

    /**
     * Order constructor.
     * @param $items
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    public function sum($name)
    {
        $total = 0;

        /** @var OrderItem $item */
        foreach ($this->items as $item) {
            $total += $item->$name;
        }

        return $total;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}