<?php

namespace Lapisense\Database\Repositories;

use Lapisense\Contracts\ActivationsRepository as RepositoryContract;

class ActivationsRepository implements RepositoryContract
{
    public function getDummyData():array
    {
        return [
            [
                'id' => 1,
                'key' => '4792ybfbf2v9brfbr92bfrbf',
                'product' => 'Dummy Software Product',
            ],
            [
                'id' => 2,
                'key' => 'f39222222b2vb42v9b49bvbv',
                'product' => 'Dummy Software Product',
            ],
        ];
    }
}
