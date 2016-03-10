<?php


use App\Order;
use App\OrderItem;

class OrderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_get_sum_of_cost_from_original_order()
    {
        // arrange
        $order = new Order([
            new OrderItem(['Id' => 1, 'Cost' => 1, 'Revenue' => 11, 'SellPrice' => 21,]),
            new OrderItem(['Id' => 2, 'Cost' => 2, 'Revenue' => 12, 'SellPrice' => 22,]),
            new OrderItem(['Id' => 3, 'Cost' => 3, 'Revenue' => 13, 'SellPrice' => 23,]),
        ]);
        $expectedTotalCost = 6;

        // act
        $actualTotalCost = $order->sum('Cost');

        // assert
        $this->assertEquals($expectedTotalCost, $actualTotalCost);
    }

    /**
     * @test
     */
    public function it_shoul_get_items_from_order()
    {
        // arrange
        $expectedItems = [
            new OrderItem(['Id' => 1, 'Cost' => 1, 'Revenue' => 11, 'SellPrice' => 21,]),
            new OrderItem(['Id' => 2, 'Cost' => 2, 'Revenue' => 12, 'SellPrice' => 22,]),
            new OrderItem(['Id' => 3, 'Cost' => 3, 'Revenue' => 13, 'SellPrice' => 23,]),
        ];
        $order = new Order($expectedItems);

        // act
        $actualItems = $order->getItems();

        // assert
        $this->assertEquals($expectedItems, $actualItems);
    }


}
