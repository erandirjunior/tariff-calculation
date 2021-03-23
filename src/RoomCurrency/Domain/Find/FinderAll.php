<?php

namespace SRC\RoomCurrency\Domain\Find;

class FinderAll
{
    public function __construct(
        private FinderAllGateway $finderAllGateway,
        private FinderAllPresenter $finderAllPresenter
    )
    {}

    public function find(int $roomId, int $hotelId): void
    {
        $content = $this->finderAllGateway->findAll($roomId, $hotelId);
        $this->finderAllPresenter->setData($content);
    }
}