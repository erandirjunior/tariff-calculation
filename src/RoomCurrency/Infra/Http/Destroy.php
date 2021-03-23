<?php

namespace SRC\RoomCurrency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Destroy extends Action
{
    public function __construct(
        private \SRC\RoomCurrency\Adapters\Gateways\Destroy $destroy
    )
    {}

    public function handle(): ResponseInterface
    {
        $controller = new \SRC\RoomCurrency\Adapters\Controllers\Destroy(
            $this->destroy
        );

        $controller->handle($this->args['roomId'], $this->args['id'], $this->args['hotelId']);

        return JsonResponse::build(204, null);
    }
}