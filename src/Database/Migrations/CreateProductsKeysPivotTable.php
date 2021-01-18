<?php

namespace Lapisense\Database\Migrations;

use Lapisense\Dependencies\CoenJacobs\Migrator\Migrations\BaseMigration;

class CreateProductsKeysPivotTable extends BaseMigration
{
    public static function id():string
    {
        return 'lapisense-3-products-keys-pivot-table';
    }

    public function up():void
    {
        $tableName = $this->worker->getPrefix() . 'lapisense_products_keys';
        $productsTable = $this->worker->getPrefix() . 'posts';
        $keysTable = $this->worker->getPrefix() . 'lapisense_keys';

        $query = "CREATE TABLE $tableName (
    product_id bigint UNSIGNED NOT NULL,
    key_id bigint UNSIGNED NOT NULL,
    FOREIGN KEY (product_id) REFERENCES $productsTable(ID),
    FOREIGN KEY (key_id) REFERENCES $keysTable(id) )";

        $this->worker->query($query);
    }

    public function down():void
    {
        $tableName = $this->worker->getPrefix() . 'lapisense_products_keys';

        $query = "DROP TABLE $tableName";
        $this->worker->query($query);
    }
}
