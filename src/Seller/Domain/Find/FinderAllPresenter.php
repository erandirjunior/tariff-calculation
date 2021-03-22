<?php

namespace SRC\Seller\Domain\Find;

interface FinderAllPresenter
{
    public function setData(SellerContainer $sellerContainer): void;
}