<?php

namespace SRC\Saller\Adapters\Gateways;

use SRC\Saller\Domain\Find\FinderByIdentifierGateway;
use SRC\Saller\Domain\RegisteredSaller;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $id): RegisteredSaller
    {
        $content = $this->findByCodeUnit->find($id);

        if (!$content) {
            throw new \DomainException('Saller not found!');
        }

        return new RegisteredSaller(
            $content['name'],
            $content['profit_margin'],
            $content['id'],
        );
    }
}