<?php

namespace SRC\RoomCoin\Infra\ViewModel;

use SRC\RoomCoin\Adapters\Presenters\RegisterVM;

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