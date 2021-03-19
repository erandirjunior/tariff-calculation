<?php

namespace SRC\Room\Domain\Find;

class FinderByIdentifier
{
    public function __construct(
        private FinderByIdentifierGateway $repository,
        private Presenter $presenter
    )
    {}

    public function find(int $hotelId, int $id): void
    {
        $user = $this->repository->find($hotelId, $id);

        $this->presenter->setData($user);
    }
}