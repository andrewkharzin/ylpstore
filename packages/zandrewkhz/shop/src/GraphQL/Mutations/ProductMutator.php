<?php


namespace Andrewkharzin\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class ProductMutator
{
    public function store($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ProductController@store', $args);
    }

    public function updateProduct($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\ProductController@updateProduct', $args);
    }
}
