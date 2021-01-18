<?php

namespace Lapisense;

use Lapisense\Admin\Bootstrap;

class Plugin
{
    /** @var Bootstrap */
    public $admin;

    /** @var ProductPostType */
    public $productPostType;

    public function __construct()
    {
        $this->admin = new Bootstrap();
        $this->productPostType = new ProductPostType();
    }

    public function setup():void
    {
        $this->admin->setup();
        $this->productPostType->setup();
    }
}
