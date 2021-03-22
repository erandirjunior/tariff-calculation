<?php

namespace SRC\Seller\Adapters\Gateways;

use SRC\Seller\Domain\Register\Seller;
use SRC\Seller\Domain\Register\RegisterGateway;
use SRC\Seller\Domain\RegisteredSeller;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Seller $seller): RegisteredSeller
    {
        $id = $this->registerUnit->register($seller->getName(), $seller->getProfitMargin());
        return new RegisteredSeller(
            $seller->getName(),
            $seller->getProfitMargin(),
            $id
        );
    }

    public function checkIfNameIsInUse(string $name): bool
    {
        return $this->registerUnit->checkIfNameIsInUse($name);
    }
}