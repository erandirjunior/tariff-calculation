<?php

namespace SRC\Hotel\Adapters\Presenters;

use SRC\Hotel\Domain\Register\Presenter;
use SRC\Hotel\Domain\RegisteredHotel;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredHotel $registeredHotel): void
    {
        $content = [
            'name' => $registeredHotel->getName(),
            'id' => $registeredHotel->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}