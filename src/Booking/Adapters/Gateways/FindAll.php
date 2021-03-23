<?php

namespace SRC\Booking\Adapters\Gateways;

use SRC\Booking\Domain\Find\BookingContainer;
use SRC\Booking\Domain\Find\FinderAllGateway;
use SRC\Booking\Domain\ContractBooking;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(int $userId): BookingContainer
    {
        $content = $this->findAllUnit->find($userId);
        $container = new BookingContainer();
        foreach ($content as $data) {
            $contract = new ContractBooking(
                $data['currency_base_id'],
                $data['currency_conversion_id'],
                $data['room_id'],
                $data['user_id'],
                $data['seller_id'],
                $data['hotel_id'],
                $data['created'],
                $data['id'],
                $data['price']
            );
            $container->add($contract);
        }
        return $container;
    }
}