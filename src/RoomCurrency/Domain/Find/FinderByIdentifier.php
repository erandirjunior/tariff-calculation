<?php

namespace SRC\RoomCoin\Domain\Find;

class FinderByIdentifier
{
    public function __construct(
        private FinderByIdentifierGateway $repository,
        private Presenter $presenter
    )
    {}

    public function find(int $roomId, int $id, int $hotelId): void
    {
        $user = $this->repository->find($roomId, $id, $hotelId);

        $this->presenter->setData($user);
    }
}