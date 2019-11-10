<?php

namespace Lapisense\Database\Migrations;

use Lapisense\Dependencies\CoenJacobs\Migrator\Migrations\BaseMigration;

class CreateActivationsTable extends BaseMigration
{
    public static function id()
    {
        return 'lapisense-2-activations-table';
    }

    public function up()
    {
        $tableName = $this->worker->getPrefix() . 'lapisense_activations';
        $keysTable = $this->worker->getPrefix() . 'lapisense_keys';

        $query = "CREATE TABLE $tableName (
        id bigint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        key_id bigint UNSIGNED NOT NULL,
        FOREIGN KEY (key_id) REFERENCES $keysTable(id) )";

        $this->worker->query($query);
    }

    /**
     * $table->uuid('id');
    $table->uuid('key_id');
    $table->foreign('key_id')->references('id')->on('keys');
    $table->timestamps();
    $table->primary('id');
     */

    public function down()
    {
        $tableName = $this->worker->getPrefix() . 'lapisense_activations';

        $query = "DROP TABLE $tableName";
        $this->worker->query($query);
    }
}
