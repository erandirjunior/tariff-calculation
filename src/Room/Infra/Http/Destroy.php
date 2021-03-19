<?php

namespace SRC\Room\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Destroy extends Action
{
    public function __construct(
        private \SRC\Room\Adapters\Gateways\Destroy $destroy
    )
    {}

    public function handle(): ResponseInterface
    {
        $controller = new \SRC\Room\Adapters\Controllers\Destroy(
            $this->destroy
        );

        $controller->handle($this->args['hotelId'], $this->args['id']);

        return JsonResponse::build(204, null);
    }
}