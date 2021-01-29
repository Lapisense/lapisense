<?php

namespace Lapisense\Api;

use Lapisense\Api\Endpoints\ActivateEndpoint;
use Lapisense\Api\Endpoints\DeactivateEndpoint;

class Bootstrap
{
    public function setup(): void
    {
        $endpoints = apply_filters('lapisense_endpoints', array(
            ActivateEndpoint::class,
            DeactivateEndpoint::class,
        ));

        foreach ($endpoints as $endpoint) {
            /** @var Endpoint $endpoint */
            $endpoint = new $endpoint();
            $endpoint->register();
        }
    }
}
