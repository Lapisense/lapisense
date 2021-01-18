<?php

namespace Lapisense\Database;

use Lapisense\Database\Migrations\CreateActivationsTable;
use Lapisense\Database\Migrations\CreateKeysTable;
use Lapisense\Database\Migrations\CreateProductsKeysPivotTable;
use Lapisense\Dependencies\CoenJacobs\Migrator\Handler;
use Lapisense\Dependencies\CoenJacobs\Migrator\Loggers\DatabaseLogger;
use Lapisense\Dependencies\CoenJacobs\Migrator\Workers\WpdbWorker;

class Installer
{
    public static function install():void
    {
        global $wpdb;
        $worker = new WpdbWorker();
        $logger = new DatabaseLogger($wpdb->prefix . 'lapisense_migrations');
        $handler = new Handler($worker, $logger);

        $handler->add('lapisense', CreateKeysTable::class);
        $handler->add('lapisense', CreateActivationsTable::class);
        $handler->add('lapisense', CreateProductsKeysPivotTable::class);

        $handler->up('lapisense');
    }
}
