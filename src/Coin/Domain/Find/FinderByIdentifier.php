<?php

namespace SRC\Coin\Domain\Find;

class FinderByIdentifier
{
    public function __construct(
        private FinderByIdentifierGateway $repository,
        private Presenter $presenter
    )
    {}

    public function find(int $id): void
    {
        $user = $this->repository->find($id);

        $this->presenter->setData($user);
    }
}