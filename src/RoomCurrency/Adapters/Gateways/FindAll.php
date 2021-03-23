<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

use SRC\RoomCurrency\Domain\Find\FinderAllGateway;
use SRC\RoomCurrency\Domain\Find\RoomPriceContainer;
use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(int $roomId, int $hotelId): RoomPriceContainer
    {
        $content = $this->findAllUnit->find($roomId, $hotelId);
        $container = new RoomPriceContainer();
        foreach ($content as $data) {
            $hotel = new RegisteredRoomCurrency(
                $data['room_id'],
                $data['currency_id'],
                $data['price'],
                $data['hotel_id'],
                $data['id']
            );
            $container->add($hotel);
        }
        return $container;
    }
}