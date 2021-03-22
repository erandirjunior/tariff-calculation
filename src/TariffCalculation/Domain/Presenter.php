<?php

namespace SRC\TariffCalculation\Domain;

interface Presenter
{
    public function setData(float $price): void;
}