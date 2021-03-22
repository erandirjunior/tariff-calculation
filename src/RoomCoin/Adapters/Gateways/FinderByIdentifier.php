<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\Find\FinderByIdentifierGateway;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $roomId, int $id): RegisteredRoomCoin
    {
        $content = $this->findByCodeUnit->find($roomId, $id);

        if (!$content) {
            throw new \DomainException('Room not found!');
        }

        return new RegisteredRoomCoin(
            $content['room_id'],
            $content['coin_id'],
            $content['price'],
            $content['id']
        );
    }
}