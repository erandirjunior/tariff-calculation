<?php

namespace SRC\RoomCurrency\Infra\ViewModel;

use SRC\RoomCurrency\Adapters\Presenters\RegisterVM;

class Register implements RegisterVM
{
    public function __construct(private array $data = [])
    {}

    public function setData(array $content)
    {
        $this->data = $content;
    }

    public function getData(): array
    {
        return $this->data;
    }
}