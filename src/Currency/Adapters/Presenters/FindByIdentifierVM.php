<?php

namespace SRC\Currency\Adapters\Presenters;

interface FindByIdentifierVM
{
    public function setData(string $currency, float $profitMargin, int $id): void;

    public function getData(): array;
}