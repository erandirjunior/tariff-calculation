<?php

namespace SRC\Booking\Adapters\Gateways;

use SRC\Booking\Domain\Find\FinderByIdentifierGateway;
use SRC\Booking\Domain\ContractBooking;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $userId, int $id): ContractBooking
    {
        $data = $this->findByCodeUnit->find($userId, $id);

        if (!$data) {
            throw new \DomainException('Booking not found!');
        }

        return new ContractBooking(
            $data['coin_base_id'],
            $data['coin_conversion_id'],
            $data['room_id'],
            $data['user_id'],
            $data['seller_id'],
            $data['hotel_id'],
            $data['created'],
            $data['id'],
            $data['price']
        );
    }
}