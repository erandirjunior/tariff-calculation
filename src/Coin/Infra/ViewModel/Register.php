<?php

namespace SRC\Coin\Infra\ViewModel;

use SRC\Coin\Adapters\Presenters\RegisterVM;

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