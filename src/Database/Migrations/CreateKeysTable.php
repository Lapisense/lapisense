<?php

namespace Lapisense\Database\Migrations;

use Lapisense\Dependencies\CoenJacobs\Migrator\Migrations\BaseMigration;

class CreateKeysTable extends BaseMigration
{
    public static function id()
    {
        return 'lapisense-1-licenses-table';
    }

    public function up()
    {
        $tableName = $this->worker->getPrefix() . 'lapisense_keys';

        $query = "CREATE TABLE $tableName (
        id bigint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `key` varchar(255) NOT NULL,
        max_activations int UNSIGNED NOT NULL,
        current_activations int UNSIGNED NOT NULL )";

        $this->worker->query($query);
    }

    public function down()
    {
        $tableName = $this->worker->getPrefix() . 'lapisense_keys';

        $query = "DROP TABLE $tableName";
        $this->worker->query($query);
    }
}
