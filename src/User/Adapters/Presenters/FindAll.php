<?php

namespace SRC\User\Adapters\Presenters;

use SRC\User\Domain\Find\UserContainer;
use SRC\User\Domain\Find\FinderAllPresenter;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(UserContainer $userContainer): void
    {
        foreach ($userContainer->getData() as $user) {
            $this->findAllVM->setData($user->getName(), $user->getEmail(), $user->getId());
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}