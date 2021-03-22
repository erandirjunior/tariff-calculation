<?php

namespace SRC\RoomCoin\Domain\Find;

class FinderAll
{
    public function __construct(
        private FinderAllGateway $finderAllGateway,
        private FinderAllPresenter $finderAllPresenter
    )
    {}

    public function find(int $roomId): void
    {
        $content = $this->finderAllGateway->findAll($roomId);
        $this->finderAllPresenter->setData($content);
    }
}