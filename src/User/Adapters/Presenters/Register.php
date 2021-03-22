<?php

namespace SRC\User\Adapters\Presenters;

use SRC\User\Domain\Register\Presenter;
use SRC\User\Domain\RegisteredUser;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredUser $registeredMoney): void
    {
        $content = [
            'name' => $registeredMoney->getName(),
            'email' => $registeredMoney->getEmail(),
            'id' => $registeredMoney->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}