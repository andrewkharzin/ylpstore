<?php


namespace Andrewkharzin\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class ShopMutator
{
    public function createShop($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@store', $args);
    }
    public function updateSHop($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@updateShop', $args);
    }
    public function deleteShop($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@deleteShop', $args);
    }
    public function approveShop($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@approveShop', $args);
    }
    public function disApproveShop($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@disApproveShop', $args);
    }
    public function addStaff($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@addStaff', $args);
    }
    public function removeStaff($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ShopController@removeStaff', $args);
    }
}
