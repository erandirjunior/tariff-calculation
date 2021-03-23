<?php

namespace SRC\Currency\Domain\Find;

use SRC\Currency\Domain\RegisteredCurrency;

interface FinderByIdentifierGateway
{
    public function find(int $id): RegisteredCurrency;
}