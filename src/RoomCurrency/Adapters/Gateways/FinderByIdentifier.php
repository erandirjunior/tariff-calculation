<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

use SRC\RoomCurrency\Domain\Find\FinderByIdentifierGateway;
use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $roomId, int $id, int $hotelId): RegisteredRoomCurrency
    {
        $content = $this->findByCodeUnit->find($roomId, $id, $hotelId);

        if (!$content) {
            throw new \DomainException('Room currency not found!');
        }

        return new RegisteredRoomCurrency(
            $content['room_id'],
            $content['currency_id'],
            $content['price'],
            $content['hotel_id'],
            $content['id']
        );
    }
}