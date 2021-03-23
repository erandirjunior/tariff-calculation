<?php

namespace SRC\Booking\Domain\Find;

class FinderAll
{
    public function __construct(
        private FinderAllGateway $finderAllGateway,
        private FinderAllPresenter $finderAllPresenter
    )
    {}

    public function find(int $userId): void
    {
        $content = $this->finderAllGateway->findAll($userId);
        $this->finderAllPresenter->setData($content);
    }
}