<?php

namespace SRC\User\Domain\Register;

use SRC\User\Domain\RegisteredUser;

interface Presenter
{
    public function addData(RegisteredUser $registeredUser): void;
}