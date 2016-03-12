<?php

use App\DivideRule\DividedByNum;
use App\Order;
use App\OrderItem;
use App\OrderDivider;

class OrderDividerTest extends PHPUnit_Framework_TestCase
{
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

    public function provider()
    {
        return [
            [
                /* Divided by */ 3,
                /* with Column */ 'Cost',
                /* should get List of Sum */ [6, 15, 24, 21,],
            ],
            [
                /* Divided by */ 4,
                /* with Column */ 'Revenue',
                /* should get List of Sum */ [50, 66, 60,],
            ],
        ];
    }

    /**
     * @test
     * @dataProvider provider
     * @group integration
     * @param $divisor
     * @param $column
     * @param $expectedCosts
     */
    public function it_should_get_sum_list_from_grouped_shippable_orders_that_divided_by_number($divisor, $column, $expectedCosts)
    {
        // arrange
        $originalOrder = $this->prepareOriginalOrder();

        // act
        $orderDivider = new OrderDivider(new DividedByNum($divisor));
        $orderCollection = $orderDivider->splitOrder($originalOrder);
        $actualCosts = $orderCollection->getSumList($column);

        // assert
        $this->assertEquals($expectedCosts, $actualCosts);
    }
}