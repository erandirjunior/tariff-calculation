<?php

namespace SRC\Coin\Domain\Find;

use SRC\Coin\Domain\RegisteredCoin;

interface FinderByIdentifierGateway
{
    public function find(int $id): RegisteredCoin;
}