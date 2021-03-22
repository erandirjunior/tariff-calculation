<?php

namespace SRC\Saller\Adapters\Presenters;

use SRC\Saller\Domain\Find\SallerContainer;
use SRC\Saller\Domain\Find\FinderAllPresenter;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(SallerContainer $sallerContainer): void
    {
        foreach ($sallerContainer->getData() as $saller) {
            $this->findAllVM->setData($saller->getName(), $saller->getProfitMargin(), $saller->getId());
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}