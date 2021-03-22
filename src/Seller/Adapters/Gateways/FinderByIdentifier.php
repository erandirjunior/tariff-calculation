<?php

namespace SRC\Seller\Adapters\Gateways;

use SRC\Seller\Domain\Find\FinderByIdentifierGateway;
use SRC\Seller\Domain\RegisteredSeller;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $id): RegisteredSeller
    {
        $content = $this->findByCodeUnit->find($id);

        if (!$content) {
            throw new \DomainException('Seller not found!');
        }

        return new RegisteredSeller(
            $content['name'],
            $content['profit_margin'],
            $content['id'],
        );
    }
}