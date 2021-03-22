<?php

namespace SRC\Seller\Domain\Find;

interface FinderAllGateway
{
    public function findAll(): SellerContainer;
}