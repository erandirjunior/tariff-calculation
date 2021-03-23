<?php

namespace SRC\Currency\Adapters\Gateways;

use SRC\Currency\Domain\Find\FinderByIdentifierGateway;
use SRC\Currency\Domain\RegisteredCurrency;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $id): RegisteredCurrency
    {
        $content = $this->findByCodeUnit->find($id);

        if (!$content) {
            throw new \DomainException('Currency not found!');
        }

        return new RegisteredCurrency(
            $content['currency'],
            $content['profit_margin'],
            $content['id'],
        );
    }
}