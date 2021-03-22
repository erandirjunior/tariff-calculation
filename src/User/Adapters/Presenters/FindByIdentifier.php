<?php

namespace SRC\User\Adapters\Presenters;

use SRC\User\Domain\Find\Presenter;
use SRC\User\Domain\RegisteredUser;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(RegisteredUser $user): void
    {
        $this->findByCodeVM->setData(
            $user->getName(),
            $user->getEmail(),
            $user->getId()
        );
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}