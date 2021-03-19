<?php

namespace SRC\Coin\Domain\Find;

interface FinderAllGateway
{
    public function findAll(): CoinContainer;
}