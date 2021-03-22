<?php

namespace SRC\RoomCoin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\RoomCoin\Adapters\Presenters\FindAllByHotelVM;

class FindAllByHotel extends Action
{
    public function __construct(
        private FindAllByHotelVM $findAllVM,
        private \SRC\RoomCoin\Adapters\Gateways\FindAllByHotel $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\RoomCoin\Adapters\Presenters\FindAllByHotel($this->findAllVM);
        $controller = new \SRC\RoomCoin\Adapters\Controllers\FindAllByHotel(
            $this->findAll,
            $presenter
        );

        $controller->handle($this->args['hotelId']);
        return JsonResponse::build(200, $presenter->getData());
    }
}