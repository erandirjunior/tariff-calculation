<?php

namespace SRC\Hotel\Domain\Find;

class FinderAll
{
    public function __construct(
        private FinderAllGateway $finderAllGateway,
        private FinderAllPresenter $finderAllPresenter
    )
    {}

    public function find(): void
    {
        $content = $this->finderAllGateway->findAll();
        $this->finderAllPresenter->setData($content);
    }
}