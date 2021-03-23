<?php

namespace SRC\Currency\Adapters\Presenters;

interface FindAllVM
{
    public function setData(string $currency, float $profitMargin, int $id): void;

    public function getData(): array;
}