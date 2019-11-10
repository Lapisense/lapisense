<?php

namespace Lapisense\Dependencies\CoenJacobs\Migrator\Loggers;

use Lapisense\Dependencies\CoenJacobs\Migrator\Contracts\Logger;
use Lapisense\Dependencies\CoenJacobs\Migrator\Contracts\Worker;

abstract class BaseLogger implements Logger
{
    /** @var Worker */
    protected $worker;

    public function setWorker(Worker $worker)
    {
        $this->worker = $worker;
    }
}
