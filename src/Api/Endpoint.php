<?php

namespace Lapisense\Api;

use WP_REST_Request;

abstract class Endpoint
{
    public function register(): void
    {
        add_action('rest_api_init', function () {
            register_rest_route(
                'lapisense/v1',
                $this->getRoute(),
                array(
                    'args' => $this->getArgs(),
                    'methods' => $this->getMethod(),
                    'callback' => array( $this, 'callback'),
                    'permission_callback' => $this->getPermissionCallback(),
                )
            );
        });
    }

    abstract public function getRoute(): string;
    abstract public function getArgs(): array;
    abstract public function getMethod(): string;
    abstract public function getPermissionCallback(): callable;

    abstract public function callback(WP_REST_Request $request): array;
}
