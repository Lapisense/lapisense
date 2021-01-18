<?php

namespace Lapisense\Admin\Pages;

use Lapisense\Admin\Tables\ActivationsTable;
use Lapisense\Database\Repositories\ActivationsRepository;

class ActivationsPage extends Page
{
    public function output():void
    {
        $table = new ActivationsTable();
        $table->setRepository(new ActivationsRepository());
        $table->prepare_items();

        ?>
        <div class="wrap">
            <h2>Activations</h2>
            <?php $table->display(); ?>
        </div>
        <?php
    }
}
