<?php

namespace SRC\Booking\Infra\ViewModel;

use SRC\Booking\Adapters\Presenters\FindByIdentifierVM;

class FindByIdentifier implements FindByIdentifierVM
{
    public function __construct(private array $data = [])
    {}

    public function setData(array $content): void
    {
        $this->data = $content;
    }

    public function getData(): array
    {
        return $this->data;
    }
}