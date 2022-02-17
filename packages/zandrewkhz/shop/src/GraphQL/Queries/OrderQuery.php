<?php


namespace Andrewkharzin\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class OrderQuery
{
    public function fetchOrders($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\OrderController@fetchOrders', $args);
    }
}
