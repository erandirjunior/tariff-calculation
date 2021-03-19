<?php

namespace Config\Dependency;

use Config\Database\MySQLConnection;
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

            // Hotel
            \SRC\Hotel\Adapters\Gateways\RegisterUnit::class => \DI\autowire(\SRC\Hotel\Infra\Repository\Register::class),
            \SRC\Hotel\Adapters\Presenters\RegisterVM::class => \DI\autowire(\SRC\Hotel\Infra\ViewModel\Register::class),
            \SRC\Hotel\Infra\Validator\Register::class => \DI\autowire(\SRC\Hotel\Infra\Validator\Register::class),
            \SRC\Hotel\Adapters\Gateways\Register::class => \DI\autowire(\SRC\Hotel\Adapters\Gateways\Register::class),

            \SRC\Hotel\Adapters\Gateways\FindByIdentifierUnit::class => \DI\autowire(\SRC\Hotel\Infra\Repository\FindByIdentifier::class),
            \SRC\Hotel\Infra\Repository\FindByIdentifier::class => \DI\autowire(\SRC\Hotel\Infra\Repository\FindByIdentifier::class),
            \SRC\Hotel\Adapters\Presenters\FindByIdentifierVM::class => \DI\autowire(\SRC\Hotel\Infra\ViewModel\FindByIdentifier::class),
            \SRC\Hotel\Adapters\Gateways\FinderByIdentifier::class => \DI\autowire(\SRC\Hotel\Adapters\Gateways\FinderByIdentifier::class),

            \SRC\Hotel\Adapters\Gateways\FindAllUnit::class => \DI\autowire(\SRC\Hotel\Infra\Repository\FindAll::class),
            \SRC\Hotel\Infra\Repository\FindAll::class => \DI\autowire(\SRC\Hotel\Infra\Repository\FindAll::class),
            \SRC\Hotel\Adapters\Presenters\FindAllVM::class => \DI\autowire(\SRC\Hotel\Infra\ViewModel\FindAll::class),
            \SRC\Hotel\Adapters\Gateways\FindAll::class => \DI\autowire(\SRC\Hotel\Adapters\Gateways\FindAll::class),

            \SRC\Hotel\Adapters\Gateways\DestroyUnit::class => \DI\autowire(\SRC\Hotel\Infra\Repository\Destroy::class),
            \SRC\Hotel\Adapters\Gateways\Destroy::class => \DI\autowire(\SRC\Hotel\Adapters\Gateways\Destroy::class),

            \SRC\Hotel\Adapters\Gateways\UpdateUnit::class => \DI\autowire(\SRC\Hotel\Infra\Repository\Update::class),
            \SRC\Hotel\Adapters\Gateways\Update::class => \DI\autowire(\SRC\Hotel\Adapters\Gateways\Update::class),

        ]);

        $container = $containerBuild->build();

        $container->set('database', function() {
            return (new MySQLConnection())->getConnection();
        });

        return $container;
    }
}