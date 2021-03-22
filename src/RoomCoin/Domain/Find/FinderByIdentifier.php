<?php

namespace SRC\RoomCoin\Domain\Find;

class FinderByIdentifier
{
    public function __construct(
        private FinderByIdentifierGateway $repository,
        private Presenter $presenter
    )
    {}

    public function find(int $roomId, int $id): void
    {
        $user = $this->repository->find($roomId, $id);

        $this->presenter->setData($user);
    }
}