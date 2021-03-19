<?php

namespace SRC\Coin\Adapters\Presenters;

interface FindByIdentifierVM
{
    public function setData(string $money, float $profitMargin, int $id): void;

    public function getData(): array;
}