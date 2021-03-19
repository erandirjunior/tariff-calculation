<?php

namespace SRC\Coin\Domain\Update;

use SRC\Coin\Domain\RegisteredCoin;

interface UpdaterGateway
{
    public function update(RegisteredCoin $registeredCoin): bool;

    public function checkIfCoinExists(int $id): bool;
}