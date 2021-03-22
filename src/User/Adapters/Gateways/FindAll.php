<?php

namespace SRC\User\Adapters\Gateways;

use SRC\User\Domain\Find\UserContainer;
use SRC\User\Domain\Find\FinderAllGateway;
use SRC\User\Domain\RegisteredUser;

class FindAll implements FinderAllGateway
{
    public function __construct(private FindAllUnit $findAllUnit)
    {}

    public function findAll(): UserContainer
    {
        $content = $this->findAllUnit->find();
        $container = new UserContainer();
        foreach ($content as $data) {
            $user = new RegisteredUser($data['name'], $data['email'], $data['id']);
            $container->add($user);
        }
        return $container;
    }
}