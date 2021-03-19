<?php

namespace SRC\Hotel\Adapters\Gateways;

use SRC\Hotel\Domain\Register\Hotel;
use SRC\Hotel\Domain\Register\RegisterGateway;
use SRC\Hotel\Domain\RegisteredHotel;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Hotel $hotel): RegisteredHotel
    {
        $id = $this->registerUnit->register($hotel->getName());
        $data = $this->registerUnit->find($id);
        return new RegisteredHotel(
            $data['name'],
            $data['id']
        );
    }

    public function checkIfNameIsInUse(string $name): bool
    {
        return $this->registerUnit->checkINameIsInUse($name);
    }
}