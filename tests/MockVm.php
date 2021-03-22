<?php


namespace Tests;


use SRC\TariffCalculation\Adapter\Presenters\PresenterVMByRoom;

class MockVm implements PresenterVMByRoom
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