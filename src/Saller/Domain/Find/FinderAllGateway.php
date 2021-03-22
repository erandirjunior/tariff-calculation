<?php

namespace SRC\Saller\Domain\Find;

interface FinderAllGateway
{
    public function findAll(): SallerContainer;
}