<?php

namespace Lapisense\Api\Endpoints;

use Lapisense\Api\Endpoint;
use Lapisense\Api\Response;
use Lapisense\Api\Responses\DeactivateResponse;
use WP_REST_Request;

class DeactivateEndpoint extends Endpoint
{
    public function getRoute(): string
    {
        return '/activations/deactivate';
    }

    public function getArgs(): array
    {
        return array(
            'activation_id' => array(
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

    public function callback(WP_REST_Request $request): Response
    {
        return new DeactivateResponse();
    }

    public function getPermissionCallback(): callable
    {
        return '__return_true';
    }
}
