<?php

namespace Config\Dependency;

use Config\Database\MySQLConnection;
use Config\Response\Json;
use DI\Container;
use DI\ContainerBuilder;
use SRC\Coin\Adapters\Gateways\DestroyUnit;
use SRC\Coin\Adapters\Gateways\FindAllUnit;
use SRC\Coin\Adapters\Gateways\FinderByIdentifier;
use SRC\Coin\Adapters\Gateways\RegisterUnit;
use SRC\Coin\Adapters\Gateways\UpdateUnit;
use SRC\Coin\Adapters\Presenters\FindAllVM;
use SRC\Coin\Adapters\Presenters\RegisterVM;
use SRC\Coin\Infra\Repository\Destroy;
use SRC\Coin\Infra\Repository\FindAll;
use SRC\Coin\Infra\Repository\Update;
use SRC\Coin\Infra\Validator\Register;
use SRC\Coin\Adapters\Gateways\FindByIdentifierUnit;
use SRC\Coin\Adapters\Presenters\FindByIdentifierVM;
use SRC\Coin\Infra\Repository\FindByIdentifier;
use SRC\Shared\Presenter\Presenter;

class DependencyInjector
{
    public function getDependencies(): Container
    {
        $containerBuild = new ContainerBuilder();

        $containerBuild->addDefinitions([
            // database
            \PDO::class => \DI\get('database'),

            // presenter mode json
//            Presenter::class => \DI\autowire(Json::class),

            // COIN
            RegisterUnit::class => \DI\autowire(\SRC\Coin\Infra\Repository\Register::class),
            RegisterVM::class => \DI\autowire(\SRC\Coin\Infra\ViewModel\Register::class),
            Register::class => \DI\autowire(Register::class),
            \SRC\Coin\Adapters\Gateways\Register::class => \DI\autowire(\SRC\Coin\Adapters\Gateways\Register::class),

            FindByIdentifierUnit::class => \DI\autowire(FindByIdentifier::class),
            FindByIdentifier::class => \DI\autowire(FindByIdentifier::class),
            FindByIdentifierVM::class => \DI\autowire(\SRC\Coin\Infra\ViewModel\FindByIdentifier::class),
            FinderByIdentifier::class => \DI\autowire(FinderByIdentifier::class),

            FindAllUnit::class => \DI\autowire(FindAll::class),
            FindAll::class => \DI\autowire(FindAll::class),
            FindAllVM::class => \DI\autowire(\SRC\Coin\Infra\ViewModel\FindAll::class),
            \SRC\Coin\Adapters\Gateways\FindAll::class => \DI\autowire(\SRC\Coin\Adapters\Gateways\FindAll::class),

            DestroyUnit::class => \DI\autowire(Destroy::class),
            \SRC\Coin\Adapters\Gateways\Destroy::class => \DI\autowire(\SRC\Coin\Adapters\Gateways\Destroy::class),

            UpdateUnit::class => \DI\autowire(Update::class),
            \SRC\Coin\Adapters\Gateways\Update::class => \DI\autowire(\SRC\Coin\Adapters\Gateways\Update::class),
        ]);

        $container = $containerBuild->build();

        $container->set('database', function() {
            return (new MySQLConnection())->getConnection();
        });

        return $container;
    }
}