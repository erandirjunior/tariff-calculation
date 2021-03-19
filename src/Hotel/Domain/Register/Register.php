<?php

namespace SRC\Hotel\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(Hotel $hotel): void
    {
        $this->registerIfNameIsUnique($hotel);
    }

    public function registerIfNameIsUnique(Hotel $hotel): void
    {
        $name = $hotel->getName();
        if ($this->registerGateway->checkIfNameIsInUse($name)) {
            throw new \DomainException('Hotel name is in use!');
        }

        $this->registerData($hotel);
    }

    private function registerData(Hotel $hotel): void
    {
        $registeredMoney = $this->registerGateway->register($hotel);
        $this->presenter->addData($registeredMoney);
    }
}