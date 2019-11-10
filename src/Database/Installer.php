<?php

namespace Lapisense\Database;

use Lapisense\Database\Migrations\CreateActivationsTable;
use Lapisense\Database\Migrations\CreateKeysTable;
use Lapisense\Dependencies\CoenJacobs\Migrator\Handler;
use Lapisense\Dependencies\CoenJacobs\Migrator\Loggers\DatabaseLogger;
use Lapisense\Dependencies\CoenJacobs\Migrator\Workers\WpdbWorker;

class Installer
{
    public static function install()
    {
        global $wpdb;
        $worker = new WpdbWorker();
        $logger = new DatabaseLogger($wpdb->prefix . 'lapisense_migrations');
        $handler = new Handler($worker, $logger);

        $handler->add('lapisense', CreateKeysTable::class);
        $handler->add('lapisense', CreateActivationsTable::class);

        $handler->up('lapisense');
    }
}
