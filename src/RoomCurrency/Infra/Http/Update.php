<?php

namespace SRC\RoomCurrency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Update extends Action
{
    public function __construct(
        private \SRC\RoomCurrency\Adapters\Gateways\Update $update,
        private \SRC\RoomCurrency\Infra\Validator\Update $updateValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->updateValidator->validate($this->body);
        $controller = new \SRC\RoomCurrency\Adapters\Controllers\Update(
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