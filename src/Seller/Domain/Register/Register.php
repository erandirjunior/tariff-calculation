<?php

namespace SRC\Seller\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(Seller $seller): void
    {
        $this->registerIfNameIsUnique($seller);
    }

    public function registerIfNameIsUnique(Seller $seller): void
    {
        $name = $seller->getName();
        if ($this->registerGateway->checkIfNameIsInUse($name)) {
            throw new \DomainException('Seller already be registered!');
        }

        $this->registerData($seller);
    }

    private function registerData(Seller $seller): void
    {
        $registeredSeller = $this->registerGateway->register($seller);
        $this->presenter->addData($registeredSeller);
    }
}