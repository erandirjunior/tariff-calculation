<?php

namespace SRC\Coin\Adapters\Presenters;

interface FindAllVM
{
    public function setData(string $money, float $profitMargin, int $id): void;

    public function getData(): array;
}