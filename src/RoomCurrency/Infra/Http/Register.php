<?php

namespace SRC\RoomCurrency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\RoomCurrency\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\RoomCurrency\Adapters\Gateways\Register $repository,
        private \SRC\RoomCurrency\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\RoomCurrency\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\RoomCurrency\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle(
            $this->args['roomId'],
            $this->body['currencyId'],
            $this->body['price'],
            $this->args['hotelId']
        );

        return JsonResponse::build(201, $presenter->getData());
    }
}