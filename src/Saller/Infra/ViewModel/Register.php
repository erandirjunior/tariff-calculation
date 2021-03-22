<?php

namespace SRC\Saller\Infra\ViewModel;

use SRC\Saller\Adapters\Presenters\RegisterVM;

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