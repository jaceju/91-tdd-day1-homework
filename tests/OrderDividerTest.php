<?php

use App\DivideRule\DividedByNum;
use App\Order;
use App\OrderItem;
use App\OrderDivider;

class OrderDividerTest extends PHPUnit_Framework_TestCase
{
    public function testSkip()
    {
    }

    protected function prepareOriginalOrder()
    {
        return new Order([
            new OrderItem(['Id' => 1, 'Cost' => 1, 'Revenue' => 11, 'SellPrice' => 21,]),
            new OrderItem(['Id' => 2, 'Cost' => 2, 'Revenue' => 12, 'SellPrice' => 22,]),
            new OrderItem(['Id' => 3, 'Cost' => 3, 'Revenue' => 13, 'SellPrice' => 23,]),
            new OrderItem(['Id' => 4, 'Cost' => 4, 'Revenue' => 14, 'SellPrice' => 24,]),
            new OrderItem(['Id' => 5, 'Cost' => 5, 'Revenue' => 15, 'SellPrice' => 25,]),
            new OrderItem(['Id' => 6, 'Cost' => 6, 'Revenue' => 16, 'SellPrice' => 26,]),
            new OrderItem(['Id' => 7, 'Cost' => 7, 'Revenue' => 17, 'SellPrice' => 27,]),
            new OrderItem(['Id' => 8, 'Cost' => 8, 'Revenue' => 18, 'SellPrice' => 28,]),
            new OrderItem(['Id' => 9, 'Cost' => 9, 'Revenue' => 19, 'SellPrice' => 29,]),
            new OrderItem(['Id' => 10, 'Cost' => 10, 'Revenue' => 20, 'SellPrice' => 30,]),
            new OrderItem(['Id' => 11, 'Cost' => 11, 'Revenue' => 21, 'SellPrice' => 31,]),
        ]);
    }


    /**
     * @test
     * @group integration
     */
    public function it_should_get_sum_of_cost_from_grouped_shippable_orders_that_divided_by_number()
    {
        // arrange
        $originalOrder = $this->prepareOriginalOrder();
        $divisor = 3;
        $expectedCosts = [6, 15, 24, 21,];

        // act
        $orderDivider = new OrderDivider(new DividedByNum($divisor));
        $orderCollection = $orderDivider->splitOrder($originalOrder);
        $actualCosts = $orderCollection->getSumList('Cost');

        // assert
        $this->assertEquals($expectedCosts, $actualCosts);
    }
}