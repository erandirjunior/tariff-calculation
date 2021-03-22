<?php

namespace SRC\Seller\Adapters\Gateways;

use SRC\Seller\Domain\Find\SellerContainer;
use SRC\Seller\Domain\Find\FinderAllGateway;
use SRC\Seller\Domain\RegisteredSeller;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(): SellerContainer
    {
        $content = $this->findAllUnit->find();
        $container = new SellerContainer();
        foreach ($content as $data) {
            $seller = new RegisteredSeller($data['name'], $data['profit_margin'], $data['id']);
            $container->add($seller);
        }
        return $container;
    }
}