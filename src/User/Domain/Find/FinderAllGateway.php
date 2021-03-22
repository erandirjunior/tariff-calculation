<?php

namespace SRC\User\Domain\Find;

interface FinderAllGateway
{
    public function findAll(): UserContainer;
}