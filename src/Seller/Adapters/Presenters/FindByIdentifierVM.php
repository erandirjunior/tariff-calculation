<?php

namespace SRC\Seller\Adapters\Presenters;

interface FindByIdentifierVM
{
    public function setData(string $name, float $profitMargin, int $id): void;

    public function getData(): array;
}