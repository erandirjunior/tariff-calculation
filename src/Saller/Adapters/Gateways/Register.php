<?php

namespace SRC\Saller\Adapters\Gateways;

use SRC\Saller\Domain\Register\Saller;
use SRC\Saller\Domain\Register\RegisterGateway;
use SRC\Saller\Domain\RegisteredSaller;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Saller $saller): RegisteredSaller
    {
        $id = $this->registerUnit->register($saller->getName(), $saller->getProfitMargin());
        return new RegisteredSaller(
            $saller->getName(),
            $saller->getProfitMargin(),
            $id
        );
    }

    public function checkIfNameIsInUse(string $name): bool
    {
        return $this->registerUnit->checkIfNameIsInUse($name);
    }
}