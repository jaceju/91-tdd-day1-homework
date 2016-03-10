<?php


use App\Order;
use App\OrderCollection;
use App\OrderItem;

class OrderCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_get_list_of_sum_from_orders()
    {
        // arrange
        $collection = new OrderCollection([
            new Order([
                new OrderItem(['Id' => 1, 'Cost' => 1, 'Revenue' => 11, 'SellPrice' => 21,]),
            ]),
            new Order([
                new OrderItem(['Id' => 2, 'Cost' => 2, 'Revenue' => 12, 'SellPrice' => 22,]),
            ]),
            new Order([
                new OrderItem(['Id' => 3, 'Cost' => 3, 'Revenue' => 13, 'SellPrice' => 23,]),
            ]),
        ]);
        $expectedSumList = [1, 2, 3, ];

        // act
        $actualSumList = $collection->getSumList('Cost');

        // assert
        $this->assertEquals($expectedSumList, $actualSumList);
    }
}
