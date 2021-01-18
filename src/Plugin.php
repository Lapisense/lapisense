<?php

namespace Lapisense;

use Lapisense\Admin\Bootstrap;

class Plugin
{
    /** @var Bootstrap */
    public $admin;

    /** @var ProductPostType */
    public $productPostType;

    public function setup():void
    {
        $this->admin = new Bootstrap();
        $this->admin->setup();

        $this->productPostType = new ProductPostType();
        $this->productPostType->setup();
    }
}
