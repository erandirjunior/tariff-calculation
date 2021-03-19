<?php

namespace SRC\Hotel\Adapters\Gateways;

use SRC\Hotel\Domain\Find\FinderAllGateway;
use SRC\Hotel\Domain\Find\HotelContainer;
use SRC\Hotel\Domain\RegisteredHotel;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(): HotelContainer
    {
        $content = $this->findAllUnit->find();
        $container = new HotelContainer();
        foreach ($content as $data) {
            $hotel = new RegisteredHotel($data['name'], $data['id']);
            $container->add($hotel);
        }
        return $container;
    }
}