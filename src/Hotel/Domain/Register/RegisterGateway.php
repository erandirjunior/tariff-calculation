<?php

namespace SRC\Hotel\Domain\Register;

use SRC\Hotel\Domain\RegisteredHotel;

interface RegisterGateway
{
    public function register(Hotel $hotel): RegisteredHotel;

    public function checkIfNameIsInUse(string $name): bool;
}