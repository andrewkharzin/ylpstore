<?php


namespace Andrewkharzin\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class WithdrawMutation
{
    public function store($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\WithdrawController@store', $args);
    }
    public function approveWithdraw($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\WithdrawController@approveWithdraw', $args);
    }
}
