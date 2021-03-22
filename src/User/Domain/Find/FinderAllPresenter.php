<?php

namespace SRC\User\Domain\Find;

interface FinderAllPresenter
{
    public function setData(UserContainer $userContainer): void;
}