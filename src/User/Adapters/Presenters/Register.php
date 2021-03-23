<?php

namespace SRC\User\Adapters\Presenters;

use SRC\User\Domain\Register\Presenter;
use SRC\User\Domain\RegisteredUser;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(RegisteredUser $registeredUser): void
    {
        $content = [
            'name' => $registeredUser->getName(),
            'email' => $registeredUser->getEmail(),
            'id' => $registeredUser->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}