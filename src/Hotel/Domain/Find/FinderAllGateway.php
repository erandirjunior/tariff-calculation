<?php

namespace SRC\Hotel\Domain\Find;

interface FinderAllGateway
{
    public function findAll(): HotelContainer;
}