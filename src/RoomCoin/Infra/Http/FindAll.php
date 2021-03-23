<?php

namespace SRC\RoomCoin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\RoomCoin\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\RoomCoin\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\RoomCoin\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\RoomCoin\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle($this->args['roomId'], $this->args['hotelId']);
        return JsonResponse::build(200, $presenter->getData());
    }
}