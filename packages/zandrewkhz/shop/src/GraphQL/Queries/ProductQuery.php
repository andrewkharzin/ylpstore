<?php


namespace Andrewkharzin\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class ProductQuery
{
    public function relatedProducts($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ProductController@relatedProducts', $args);
    }
}
