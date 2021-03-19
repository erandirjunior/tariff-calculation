<?php

namespace SRC\User\Infra\ViewModel;

use SRC\User\Adapters\Presenters\UpdateVM;

class Update implements UpdateVM
{
    public function __construct(private array $success = [])
    {}

    public function setData(bool $success): void
    {
        $this->success['success'] = $success;
    }

    public function getData(): bool
    {
        return $this->success['success'];
    }
}