<?php


namespace Andrewkharzin\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class AnalyticsQuery
{
    public function analytics($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\AnalyticsController@analytics', $args);
    }

    public function popularProducts($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\AnalyticsController@popularProducts', $args);
    }
}
