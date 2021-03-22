<?php

namespace SRC\Seller\Adapters\Presenters;

use SRC\Seller\Domain\Register\Presenter;
use SRC\Seller\Domain\RegisteredSeller;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredSeller $registeredSeller): void
    {
        $content = [
            'name' => $registeredSeller->getName(),
            'profitMargin' => $registeredSeller->getProfitMargin(),
            'id' => $registeredSeller->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}