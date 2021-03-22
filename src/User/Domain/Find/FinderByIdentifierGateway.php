<?php

namespace SRC\User\Domain\Find;

use SRC\User\Domain\RegisteredUser;

interface FinderByIdentifierGateway
{
    public function find(int $id): RegisteredUser;
}