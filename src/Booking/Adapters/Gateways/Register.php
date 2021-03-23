<?php

namespace SRC\Booking\Adapters\Gateways;

use SRC\Booking\Domain\Register\Booking;
use SRC\Booking\Domain\Register\Contract;
use SRC\Booking\Domain\Register\RegisterGateway;
use SRC\Booking\Domain\ContractBooking;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Contract $contract): ContractBooking
    {
        $id = $this->registerUnit->register(
            $contract
        );

        return new ContractBooking(
            $contract->getCurrencyBase(),
            $contract->getUserCurrencyNeed(),
            $contract->getRoomId(),
            $contract->getUserId(),
            $contract->getSellerId(),
            $contract->getHotelId(),
            $contract->getDate(),
            $id,
            $contract->getPrice()
        );
    }

    public function checkIfUseHasBookedWithOtherSeller(int $userId, int $sellerId): bool
    {
        return $this->registerUnit->checkIfUseHasBookedWithOtherSeller($userId, $sellerId);
    }
}