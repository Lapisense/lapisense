<?php

namespace Lapisense\Admin\Pages;

use Lapisense\Admin\Tables\KeysTable;
use Lapisense\Database\Repositories\KeysRepository;

class KeysPage extends Page
{
    public function output():void
    {
        $table = new KeysTable();
        $table->setRepository(new KeysRepository());
        $table->prepare_items();

        ?>
        <div class="wrap">
            <h2>License Keys</h2>
            <?php $table->display(); ?>
        </div>
        <?php
    }
}
