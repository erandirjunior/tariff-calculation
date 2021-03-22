<?php

namespace SRC\Saller\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(Saller $saller): void
    {
        $this->registerIfNameIsUnique($saller);
    }

    public function registerIfNameIsUnique(Saller $saller): void
    {
        $name = $saller->getName();
        if ($this->registerGateway->checkIfNameIsInUse($name)) {
            throw new \DomainException('Saller already be registered!');
        }

        $this->registerData($saller);
    }

    private function registerData(Saller $saller): void
    {
        $registeredMoney = $this->registerGateway->register($saller);
        $this->presenter->addData($registeredMoney);
    }
}