<?php


namespace Andrewkharzin\GraphQL\Mutation;

use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Andrewkharzin\Facades\Shop;

class CouponMutator
{

    public function verify($rootValue, array $args, GraphQLContext $context)
    {
        try {
            return Shop::call('Andrewkharzin\Http\Controllers\CouponController@verify', $args);
        } catch (\Exception $e) {
            return Log::info($e->getMessage());
        }
    }
}
