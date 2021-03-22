<?php

namespace SRC\Seller\Infra\ViewModel;

use SRC\Seller\Adapters\Presenters\FindAllVM;

class FindAll implements FindAllVM
{
    public function __construct(private array $data = [])
    {}

    public function setData(string $name, float $profitMargin, int $id): void
    {
        $this->data[] = [
            'name' => $name,
            'profitMargin' => $profitMargin,
            'id' => $id,
        ];
    }

    public function getData(): array
    {
        return $this->data;
    }
}