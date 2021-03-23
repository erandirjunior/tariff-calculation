<?php

namespace SRC\Booking\Domain\Find;

class FinderByIdentifier
{
    public function __construct(
        private FinderByIdentifierGateway $repository,
        private Presenter $presenter
    )
    {}

    public function find(int $userId, int $id): void
    {
        $user = $this->repository->find($userId, $id);

        $this->presenter->setData($user);
    }
}