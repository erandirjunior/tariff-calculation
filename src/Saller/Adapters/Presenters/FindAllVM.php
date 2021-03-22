<?php

namespace SRC\Saller\Adapters\Presenters;

interface FindAllVM
{
    public function setData(string $name, float $profitMargin, int $id): void;

    public function getData(): array;
}