<?php

namespace SRC\RoomCurrency\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(RoomCurrency $roomCurrency): void
    {
        $this->checkIfCurrencyExists($roomCurrency);
    }

    private function checkIfCurrencyExists(RoomCurrency $roomCurrency): void
    {
        if (!$this->registerGateway->checkIfCurrencyExists($roomCurrency->getCurrencyId())) {
            throw new \InvalidArgumentException('Currency is not valid!');
        }

        $this->registerIfRoomCurrencyIsUnique($roomCurrency);
    }

    public function registerIfRoomCurrencyIsUnique(RoomCurrency $roomCurrency): void
    {
        $roomId = $roomCurrency->getRoomId();
        $currencyId = $roomCurrency->getCurrencyId();
        if ($this->registerGateway->registerIfRoomCurrencyIsUnique($roomId, $currencyId)) {
            $msg = "The room currency for this hotel's room already be registered.";
            throw new \DomainException($msg);
        }

        $this->registerData($roomCurrency);
    }

    private function registerData(RoomCurrency $roomCurrency): void
    {
        $registeredRoomPrice = $this->registerGateway->register($roomCurrency);
        $this->presenter->addData($registeredRoomPrice);
    }
}