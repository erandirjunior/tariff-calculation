<?php

namespace SRC\Booking\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Destroy extends Action
{
    public function __construct(
        private \SRC\Booking\Adapters\Gateways\Destroy $destroy
    )
    {}

    public function handle(): ResponseInterface
    {
        $controller = new \SRC\Booking\Adapters\Controllers\Destroy(
            $this->destroy
        );

        $controller->handle($this->args['id']);

        return JsonResponse::build(204, null);
    }
}