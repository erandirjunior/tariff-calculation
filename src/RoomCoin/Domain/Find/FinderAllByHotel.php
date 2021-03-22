<?php

namespace SRC\RoomCoin\Domain\Find;

class FinderAllByHotel
{
    public function __construct(
        private FinderAllByHotelGateway $finderAllByHotelGateway,
        private FinderAllByHotelPresenter $finderAllByHotelPresenter
    )
    {}

    public function find(int $roomId): void
    {
        $content = $this->finderAllByHotelGateway->findAll($roomId);
        $this->finderAllByHotelPresenter->setData($content);
    }
}