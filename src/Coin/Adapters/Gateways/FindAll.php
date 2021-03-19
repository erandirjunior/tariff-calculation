<?php

namespace SRC\Coin\Adapters\Gateways;

use SRC\Coin\Domain\Find\CoinContainer;
use SRC\Coin\Domain\Find\FinderAllGateway;
use SRC\Coin\Domain\RegisteredCoin;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(): CoinContainer
    {
        $content = $this->findAllUnit->find();
        $container = new CoinContainer();
        foreach ($content as $data) {
            $coin = new RegisteredCoin($data['money'], $data['profit_margin'], $data['id']);
            $container->add($coin);
        }
        return $container;
    }
}