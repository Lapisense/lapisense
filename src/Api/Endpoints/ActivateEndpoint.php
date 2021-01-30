<?php

namespace Lapisense\Api\Endpoints;

use Lapisense\Api\Endpoint;
use Lapisense\Api\Response;
use Lapisense\Api\Responses\ActivateResponse;
use Lapisense\Api\Responses\FailedParametersReponse;
use Lapisense\Contracts\ProductsRepository;
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

    public function callback(WP_REST_Request $request): Response
    {
        $product_id = $request->get_param('product_id');

        if (empty($product_id)) {
            return new FailedParametersReponse();
        }

        /** @var ProductsRepository $repository */
        $repository = lapisense()->make(ProductsRepository::class);
        $product = $repository->getById($product_id);

        return new ActivateResponse();
    }

    public function getPermissionCallback(): callable
    {
        return '__return_true';
    }
}
