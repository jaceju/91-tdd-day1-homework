<?php

namespace App;

class OrderItem
{
    /**
     * @var array
     */
    private $data;

    /**
     * OrderItem constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }
}