<?php

namespace SRC\User\Domain\Find;

use SRC\User\Domain\RegisteredUser;

interface Presenter
{
    public function setData(RegisteredUser $registeredUser): void;
}