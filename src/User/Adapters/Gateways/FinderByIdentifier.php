<?php

namespace SRC\User\Adapters\Gateways;

use SRC\User\Domain\Find\FinderByIdentifierGateway;
use SRC\User\Domain\RegisteredUser;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $id): RegisteredUser
    {
        $content = $this->findByCodeUnit->find($id);

        if (!$content) {
            throw new \DomainException('User not found!');
        }

        return new RegisteredUser(
            $content['name'],
            $content['email'],
            $content['id'],
        );
    }
}