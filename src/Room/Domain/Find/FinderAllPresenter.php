<?php

namespace SRC\Room\Domain\Find;

interface FinderAllPresenter
{
    public function setData(RoomContainer $roomContainer): void;
}