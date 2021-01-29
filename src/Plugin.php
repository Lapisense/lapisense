<?php

namespace Lapisense;

use Lapisense\Admin\Bootstrap as AdminBootstrap;
use Lapisense\Api\Bootstrap as ApiBootstrap;

class Plugin
{
    /** @var AdminBootstrap */
    public $admin;

    /** @var ProductPostType */
    public $productPostType;

    /** @var ApiBootstrap */
    public $api;

    public function __construct()
    {
        $this->admin = new AdminBootstrap();
        $this->productPostType = new ProductPostType();
        $this->api = new ApiBootstrap();
    }

    public function setup():void
    {
        $this->admin->setup();
        $this->productPostType->setup();
        $this->api->setup();
    }
}
