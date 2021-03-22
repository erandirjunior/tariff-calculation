<?php

namespace SRC\Saller\Adapters\Gateways;

use SRC\Saller\Domain\Find\SallerContainer;
use SRC\Saller\Domain\Find\FinderAllGateway;
use SRC\Saller\Domain\RegisteredSaller;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(): SallerContainer
    {
        $content = $this->findAllUnit->find();
        $container = new SallerContainer();
        foreach ($content as $data) {
            $saller = new RegisteredSaller($data['name'], $data['profit_margin'], $data['id']);
            $container->add($saller);
        }
        return $container;
    }
}