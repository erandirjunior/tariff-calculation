<?php

namespace SRC\TariffCalculation\Adapter\Presenters;

class PresenterByRoom implements \SRC\TariffCalculation\Domain\Presenter
{
    public function __construct(private PresenterVMByRoom $presenterVM)
    {}

    public function setData(float $price): void
    {
        $this->presenterVM->setData($price);
    }

    public function getData(): array
    {
        return $this->presenterVM->getData();
    }
}