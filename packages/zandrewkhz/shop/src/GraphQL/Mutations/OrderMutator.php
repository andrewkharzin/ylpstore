<?php


namespace Andrewkharzin\GraphQL\Mutation;

use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Exceptions\AndrewkharzinException;
use Andrewkharzin\Facades\Shop;

class OrderMutator
{

    public function store($rootValue, array $args, GraphQLContext $context)
    {
        try {
            return Shop::call('Andrewkharzin\Http\Controllers\OrderController@store', $args);
        } catch (\Exception $e) {
            throw new StoreException('STORE_ERROR.SOMETHING_WENT_WRONG');
        }
    }
    public function update($rootValue, array $args, GraphQLContext $context)
    {
        try {
            return Shop::call('Andrewkharzin\Http\Controllers\OrderController@updateOrder', $args);
        } catch (\Exception $e) {
            throw new StoreException('STORE_ERROR.SOMETHING_WENT_WRONG');
        }
    }
}
