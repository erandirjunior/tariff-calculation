<?php

namespace SRC\Room\Domain\Register;

use SRC\Room\Domain\RegisteredRoom;

interface Presenter
{
    public function addData(RegisteredRoom $registeredRoom): void;
}