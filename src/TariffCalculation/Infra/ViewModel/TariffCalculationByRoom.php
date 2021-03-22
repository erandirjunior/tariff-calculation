<?php

namespace SRC\TariffCalculation\Infra\ViewModel;

use SRC\TariffCalculation\Adapter\Presenters\PresenterVMByRoom;

class TariffCalculationByRoom implements PresenterVMByRoom
{
    public function __construct(private array $data = [])
    {}

    public function setData(float $price): void
    {
        $this->data['price'] = $price;
    }

    public function getData(): array
    {
        return $this->data;
    }
}