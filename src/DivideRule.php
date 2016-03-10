<?php

namespace App;

interface DivideRule
{
    /**
     * @param Order $order
     * @return mixed
     */
    public function divide(Order $order);
}