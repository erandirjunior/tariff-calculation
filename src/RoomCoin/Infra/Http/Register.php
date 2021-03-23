<?php

namespace SRC\RoomCoin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\RoomCoin\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\RoomCoin\Adapters\Gateways\Register $repository,
        private \SRC\RoomCoin\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\RoomCoin\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\RoomCoin\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle(
            $this->args['roomId'],
            $this->body['coinId'],
            $this->body['price'],
            $this->args['hotelId']
        );

        return JsonResponse::build(201, $presenter->getData());
    }
}