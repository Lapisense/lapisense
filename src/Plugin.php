<?php

namespace Lapisense;

use Lapisense\Admin\Bootstrap;

class Plugin
{
    /** @var Bootstrap */
    public $admin;

    public function setup()
    {
        $this->admin = new Bootstrap();
        $this->admin->setup();
    }
}
