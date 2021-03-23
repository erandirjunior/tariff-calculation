<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\Find\FinderAllGateway;
use SRC\RoomCoin\Domain\Find\RoomPriceContainer;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(int $roomId, int $hotelId): RoomPriceContainer
    {
        $content = $this->findAllUnit->find($roomId, $hotelId);
        $container = new RoomPriceContainer();
        foreach ($content as $data) {
            $hotel = new RegisteredRoomCoin(
                $data['room_id'],
                $data['coin_id'],
                $data['price'],
                $data['hotel_id'],
                $data['id']
            );
            $container->add($hotel);
        }
        return $container;
    }
}