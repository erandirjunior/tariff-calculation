<?php

namespace SRC\TariffCalculation\Adapter\Presenters;

interface PresenterVMByRoom
{
    public function setData(float $price): void;

    public function getData(): array;
}