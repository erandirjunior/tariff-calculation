<?php

namespace SRC\Saller\Adapters\Presenters;

use SRC\Saller\Domain\Register\Presenter;
use SRC\Saller\Domain\RegisteredSaller;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredSaller $registeredSaller): void
    {
        $content = [
            'name' => $registeredSaller->getName(),
            'profitMargin' => $registeredSaller->getProfitMargin(),
            'id' => $registeredSaller->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}