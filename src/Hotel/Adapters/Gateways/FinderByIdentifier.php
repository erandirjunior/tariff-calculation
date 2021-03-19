<?php

namespace SRC\Hotel\Adapters\Gateways;

use SRC\Hotel\Domain\Find\FinderByIdentifierGateway;
use SRC\Hotel\Domain\RegisteredHotel;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $id): RegisteredHotel
    {
        $content = $this->findByCodeUnit->find($id);

        if (!$content) {
            throw new \DomainException('Hotel not found!');
        }

        return new RegisteredHotel(
            $content['name'],
            $content['id']
        );
    }
}