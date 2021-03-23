<?php

namespace SRC\Currency\Domain\Find;

interface FinderAllGateway
{
    public function findAll(): CurrencyContainer;
}