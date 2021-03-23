<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\Find\FinderByIdentifierGateway;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $roomId, int $id, int $hotelId): RegisteredRoomCoin
    {
        $content = $this->findByCodeUnit->find($roomId, $id, $hotelId);

        if (!$content) {
            throw new \DomainException('Room coin not found!');
        }

        return new RegisteredRoomCoin(
            $content['room_id'],
            $content['currency_id'],
            $content['price'],
            $content['hotel_id'],
            $content['id']
        );
    }
}