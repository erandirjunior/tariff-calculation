<?php

namespace SRC\User\Infra\ViewModel;

use SRC\User\Adapters\Presenters\FindAllVM;

class FindAll implements FindAllVM
{
    public function __construct(private array $data = [])
    {}

    public function setData(string $name, string $email, int $id): void
    {
        $this->data[] = [
            'name' => $name,
            'email' => $email,
            'id' => $id,
        ];
    }

    public function getData(): array
    {
        return $this->data;
    }
}