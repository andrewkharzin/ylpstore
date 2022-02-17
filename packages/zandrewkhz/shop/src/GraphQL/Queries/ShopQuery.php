<?php


namespace Andrewkharzin\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class ShopQuery
{
    public function fetchShops($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@fetchShops', $args);
    }
}
