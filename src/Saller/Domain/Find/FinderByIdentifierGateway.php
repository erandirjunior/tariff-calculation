<?php

namespace SRC\Saller\Domain\Find;

use SRC\Saller\Domain\RegisteredSaller;

interface FinderByIdentifierGateway
{
    public function find(int $id): RegisteredSaller;
}