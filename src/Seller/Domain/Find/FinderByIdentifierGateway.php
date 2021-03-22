<?php

namespace SRC\Seller\Domain\Find;

use SRC\Seller\Domain\RegisteredSeller;

interface FinderByIdentifierGateway
{
    public function find(int $id): RegisteredSeller;
}