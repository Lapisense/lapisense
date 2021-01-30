<?php

namespace Lapisense\Database;

use Lapisense\Contracts\ProductsRepository as ProductsRepositoryContract;
use Lapisense\Contracts\ActivationsRepository as ActivationsRepositoryContract;
use Lapisense\Contracts\KeysRepository as KeysRepositoryContract;
use Lapisense\Database\Repositories\ActivationsRepository;
use Lapisense\Database\Repositories\KeysRepository;
use Lapisense\Database\Repositories\ProductsRepository;
use Lapisense\Dependencies\Pimple\Container;
use Lapisense\Dependencies\Pimple\ServiceProviderInterface;

class DatabaseServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple):void
    {
        $pimple[ProductsRepositoryContract::class] = function (Container $c):ProductsRepositoryContract {
            return new ProductsRepository();
        };

        $pimple[KeysRepositoryContract::class] = function (Container $c):KeysRepositoryContract {
            return new KeysRepository();
        };

        $pimple[ActivationsRepositoryContract::class] = function (Container $c):ActivationsRepositoryContract {
            return new ActivationsRepository();
        };
    }
}
