<?php

namespace SRC\Currency\Adapters\Gateways;

use SRC\Currency\Domain\Find\CurrencyContainer;
use SRC\Currency\Domain\Find\FinderAllGateway;
use SRC\Currency\Domain\RegisteredCurrency;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(): CurrencyContainer
    {
        $content = $this->findAllUnit->find();
        $container = new CurrencyContainer();
        foreach ($content as $data) {
            $currency = new RegisteredCurrency($data['currency'], $data['profit_margin'], $data['id']);
            $container->add($currency);
        }
        return $container;
    }
}