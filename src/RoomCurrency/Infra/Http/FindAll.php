<?php

namespace SRC\RoomCurrency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\RoomCurrency\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\RoomCurrency\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\RoomCurrency\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\RoomCurrency\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle($this->args['roomId'], $this->args['hotelId']);
        return JsonResponse::build(200, $presenter->getData());
    }
}