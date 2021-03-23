<?php

namespace SRC\Booking\Infra\ViewModel;

use SRC\Booking\Adapters\Presenters\FindAllVM;

class FindAll implements FindAllVM
{
    public function __construct(private array $data = [])
    {}

    public function setData($content): void
    {
        $this->data[] = $content;
    }

    public function getData(): array
    {
        return $this->data;
    }
}