<?php

namespace Lapisense\Api\Endpoints;

use Lapisense\Api\Endpoint;
use WP_REST_Request;

class ActivateEndpoint extends Endpoint
{
    public function getRoute(): string
    {
        return '/activations/activate';
    }

    public function getArgs(): array
    {
        return array(
            'license_key' => array(
                'required' => true,
            ),
            'product_id' => array(
                'required' => true,
            ),
        );
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function callback(WP_REST_Request $request): array
    {
        return array(
            'all good' => 'bye',
        );
    }

    public function getPermissionCallback(): callable
    {
        return '__return_true';
    }
}
