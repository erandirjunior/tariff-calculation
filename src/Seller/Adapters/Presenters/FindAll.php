<?php

namespace SRC\Seller\Adapters\Presenters;

use SRC\Seller\Domain\Find\SellerContainer;
use SRC\Seller\Domain\Find\FinderAllPresenter;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(SellerContainer $sellerContainer): void
    {
        foreach ($sellerContainer->getData() as $seller) {
            $this->findAllVM->setData($seller->getName(), $seller->getProfitMargin(), $seller->getId());
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}