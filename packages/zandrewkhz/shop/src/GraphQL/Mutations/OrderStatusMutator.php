<?php


namespace Andrewkharzin\GraphQL\Mutation;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Http\Controllers\OrderStatusController;
use Andrewkharzin\Facades\Shop;

class OrderStatusMutator
{

    public function store($rootValue, array $args, GraphQLContext $context)
    {

        // Do graphql stuff
        return Shop::call('Andrewkharzin\Http\Controllers\OrderStatusController@store', $args);
    }
}
