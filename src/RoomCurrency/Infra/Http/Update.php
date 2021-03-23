<?php

namespace SRC\RoomCoin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Update extends Action
{
    public function __construct(
        private \SRC\RoomCoin\Adapters\Gateways\Update $update,
        private \SRC\RoomCoin\Infra\Validator\Update $updateValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->updateValidator->validate($this->body);
        $controller = new \SRC\RoomCoin\Adapters\Controllers\Update(
            $this->update
        );

        $controller->handle(
            $this->args['roomId'],
            $this->body['currencyId'],
            $this->body['price'],
            $this->args['id'],
            $this->args['hotelId']
        );

        return JsonResponse::build(204, null);
    }
}