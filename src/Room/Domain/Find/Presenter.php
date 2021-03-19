<?php

namespace SRC\Room\Domain\Find;

use SRC\Room\Domain\RegisteredRoom;

interface Presenter
{
    public function setData(RegisteredRoom $registeredRoom): void;
}