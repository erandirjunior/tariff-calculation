<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\Find\FinderAllByHotelGateway;
use SRC\RoomCoin\Domain\Find\RoomPriceContainer;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class FindAllByHotel implements FinderAllByHotelGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(int $hotelId): RoomPriceContainer
    {
        $content = $this->findAllUnit->find($hotelId);
        $container = new RoomPriceContainer();
        foreach ($content as $data) {
            $hotel = new RegisteredRoomCoin($data['room_id'], $data['coin_id'], $data['price'], $data['id']);
            $container->add($hotel);
        }
        return $container;
    }
}