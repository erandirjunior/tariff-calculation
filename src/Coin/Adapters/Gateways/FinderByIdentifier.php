<?php

namespace SRC\Coin\Adapters\Gateways;

use SRC\Coin\Domain\Find\FinderByIdentifierGateway;
use SRC\Coin\Domain\RegisteredCoin;

class FinderByIdentifier implements FinderByIdentifierGateway
{
    public function __construct(private FindByIdentifierUnit $findByCodeUnit)
    {}

    public function find(int $id): RegisteredCoin
    {
        $content = $this->findByCodeUnit->find($id);

        if (!$content) {
            throw new \DomainException('Coin not found!');
        }

        return new RegisteredCoin(
            $content['money'],
            $content['profit_margin'],
            $content['id'],
        );
    }
}