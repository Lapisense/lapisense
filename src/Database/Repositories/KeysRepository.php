<?php

namespace Lapisense\Database\Repositories;

use Lapisense\Contracts\KeysRepository as RepositoryContract;

class KeysRepository implements RepositoryContract
{
    public function getDummyData():array
    {
        return [
            [
                'id' => 1,
                'key' => '4792ybfbf2v9brfbr92bfrbf',
                'product' => 'Dummy Software Product',
                'activations' => '1/4',
            ],
            [
                'id' => 2,
                'key' => 'f39222222b2vb42v9b49bvbv',
                'product' => 'Dummy Software Product',
                'activations' => '4/4',
            ],
        ];
    }
}
