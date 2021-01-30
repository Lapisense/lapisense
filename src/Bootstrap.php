<?php

namespace Lapisense;

use Lapisense\Admin\AdminServiceProvider;
use Lapisense\Admin\Bootstrap as AdminBootstrap;
use Lapisense\Api\ApiServiceProvider;
use Lapisense\Api\Bootstrap as ApiBootstrap;
use Lapisense\Database\DatabaseServiceProvider;
use Lapisense\Dependencies\Pimple\ServiceProviderInterface;

class Bootstrap
{
    /** @var Plugin */
    public $plugin;

    /** @var AdminBootstrap */
    public $admin;

    /** @var ProductPostType */
    public $productPostType;

    /** @var ApiBootstrap */
    public $api;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
        $this->admin = new AdminBootstrap();
        $this->productPostType = new ProductPostType();
        $this->api = new ApiBootstrap();
    }

    public function setup():void
    {
        $this->setupServiceProviders();

        $this->admin->setup();
        $this->productPostType->setup();
        $this->api->setup();
    }

    private function setupServiceProviders():void
    {
        $service_providers = apply_filters('lapisense_service_providers', array(
            AdminServiceProvider::class,
            ApiServiceProvider::class,
            DatabaseServiceProvider::class,
        ));

        foreach ($service_providers as $service_provider) {
            /** @var ServiceProviderInterface $service_provider */
            $service_provider = new $service_provider();
            $service_provider->register($this->plugin);
        }
    }
}
