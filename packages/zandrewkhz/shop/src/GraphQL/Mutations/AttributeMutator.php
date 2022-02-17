<?php


namespace Andrewkharzin\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class AttributeMutator
{
    public function storeAttribute($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\AttributeController@store', $args);
    }
    public function updateAttribute($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\AttributeController@updateAttribute', $args);
    }
    public function deleteAttribute($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('Andrewkharzin\Http\Controllers\AttributeController@deleteAttribute', $args);
    }
}
