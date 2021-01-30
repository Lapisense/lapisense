<?php

namespace Lapisense\Database\Repositories;

use Lapisense\Contracts\ProductsRepository as RepositoryContract;
use Lapisense\Models\Product;

class ProductsRepository implements RepositoryContract
{
    public function getById(string $id): Product
    {
        return new Product();
    }
}
