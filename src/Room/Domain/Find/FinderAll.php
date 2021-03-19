<?php

namespace SRC\Room\Domain\Find;

class FinderAll
{
    public function __construct(
        private FinderAllGateway $finderAllGateway,
        private FinderAllPresenter $finderAllPresenter
    )
    {}

    public function find(int $hotelId): void
    {
        $content = $this->finderAllGateway->findAll($hotelId);
        $this->finderAllPresenter->setData($content);
    }
}