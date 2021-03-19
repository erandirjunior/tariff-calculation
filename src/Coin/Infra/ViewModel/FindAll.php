<?php

namespace SRC\Coin\Infra\ViewModel;

use SRC\Coin\Adapters\Presenters\FindAllVM;

class FindAll implements FindAllVM
{
    public function __construct(private array $data = [])
    {}

    public function setData(string $money, float $profitMargin, int $id): void
    {
        $this->data[] = [
            'money' => $money,
            'profitMargin' => $profitMargin,
            'id' => $id,
        ];
    }

    public function getData(): array
    {
        return $this->data;
    }
}