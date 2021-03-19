<?php

namespace SRC\Room\Adapters\Gateways;

use SRC\Room\Domain\Find\FinderAllGateway;
use SRC\Room\Domain\Find\RoomContainer;
use SRC\Room\Domain\RegisteredRoom;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(int $hotelId): RoomContainer
    {
        $content = $this->findAllUnit->find($hotelId);
        $container = new RoomContainer();
        foreach ($content as $data) {
            $hotel = new RegisteredRoom($data['room'], $data['hotel_id'], $data['id']);
            $container->add($hotel);
        }
        return $container;
    }
}