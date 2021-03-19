<?php

namespace SRC\Hotel\Infra\ViewModel;

use SRC\Hotel\Adapters\Presenters\FindAllVM;

class FindAll implements FindAllVM
{
    public function __construct(private array $data = [])
    {}

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(string $name, int $id): void
    {
        $this->data[] = [
            'name' => $name,
            'id' => $id,
        ];
    }
}