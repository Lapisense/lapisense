<?php

namespace Lapisense\Contracts;

use Lapisense\Models\Product;

interface ProductsRepository
{
    public function getById(string $id): Product;
}
