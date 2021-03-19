<?php

namespace SRC\Room\Adapters\Gateways;

use SRC\Room\Domain\Find\FinderByIdentifierGateway;
use SRC\Room\Domain\RegisteredRoom;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $hotelId, int $id): RegisteredRoom
    {
        $content = $this->findByCodeUnit->find($hotelId, $id);

        if (!$content) {
            throw new \DomainException('Room not found!');
        }

        return new RegisteredRoom(
            $content['room'],
            $content['hotel_id'],
            $content['id']
        );
    }
}