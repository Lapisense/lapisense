<?php

namespace Lapisense\Dependencies\CoenJacobs\Migrator\Migrations;

use Lapisense\Dependencies\CoenJacobs\Migrator\Contracts\Worker;
use Lapisense\Dependencies\CoenJacobs\Migrator\Contracts\Migration;

abstract class BaseMigration implements Migration
{
    /** @var Worker */
    protected $worker;

    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }
}
