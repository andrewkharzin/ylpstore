<?php


namespace Andrewkharzin\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class WithdrawQuery
{
    public function fetchWithdraws($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\WithdrawController@fetchWithdraws', $args);
    }

    public function fetchSingleWithdraw($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\WithdrawController@fetchSingleWithdraw', $args);
    }
}
