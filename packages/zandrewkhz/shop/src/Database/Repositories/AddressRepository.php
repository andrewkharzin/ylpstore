<?php


namespace Andrewkharzin\Database\Repositories;

use Andrewkharzin\Database\Models\Address;

class AddressRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Address::class;
    }
}
