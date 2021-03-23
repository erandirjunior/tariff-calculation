<?php

namespace SRC\Booking\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter,
        private TariffCalculationGateway $tariffCalculationGateway
    )
    {}

    public function register(Booking $booking): void
    {
        $result = $this->registerGateway
            ->checkIfUseHasBookedWithOtherSeller($booking->getUserId(), $booking->getSellerId());
        if ($result) {
            throw new \DomainException('User cannot booking with seller!');
        }

        $price = $this->tariffCalculationGateway->calculate(
            $booking->getCoinBase(),
            $booking->getUserCoinNeed(),
            $booking->getRoomId(),
            $booking->getSellerId(),
            $booking->getHotelId()
        );

        $contract = new Contract(
            $booking->getCoinBase(),
            $booking->getUserCoinNeed(),
            $booking->getRoomId(),
            $booking->getUserId(),
            $booking->getSellerId(),
            $booking->getHotelId(),
            date('Y-m-d'),
            $price
        );

        $this->presenter->addData(
            $this->registerGateway->register($contract)
        );
    }
}