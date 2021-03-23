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
use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeUnit;
use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeValue;
use SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoomUnit;
use SRC\TariffCalculation\Adapter\Presenters\PresenterByRoom;
use SRC\TariffCalculation\Adapter\Presenters\PresenterVMByRoom;
use SRC\TariffCalculation\Infra\Repository\GetCurrentExchange;
use SRC\TariffCalculation\Infra\Repository\TariffCalculationByRoom;
use function DI\autowire;

class DependencyInjector
{
    public function getDependencies(): Container
    {
        $containerBuild = new ContainerBuilder();

        $containerBuild->addDefinitions([
            // database
            \PDO::class => \DI\get('database'),

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

            // Room
            \SRC\Room\Adapters\Gateways\RegisterUnit::class => \DI\autowire(\SRC\Room\Infra\Repository\Register::class),
            \SRC\Room\Adapters\Presenters\RegisterVM::class => \DI\autowire(\SRC\Room\Infra\ViewModel\Register::class),
            \SRC\Room\Infra\Validator\Register::class => \DI\autowire(\SRC\Room\Infra\Validator\Register::class),
            \SRC\Room\Adapters\Gateways\Register::class => \DI\autowire(\SRC\Room\Adapters\Gateways\Register::class),

            \SRC\Room\Adapters\Gateways\FindByIdentifierUnit::class => \DI\autowire(\SRC\Room\Infra\Repository\FindByIdentifier::class),
            \SRC\Room\Infra\Repository\FindByIdentifier::class => \DI\autowire(\SRC\Room\Infra\Repository\FindByIdentifier::class),
            \SRC\Room\Adapters\Presenters\FindByIdentifierVM::class => \DI\autowire(\SRC\Room\Infra\ViewModel\FindByIdentifier::class),
            \SRC\Room\Adapters\Gateways\FinderByIdentifier::class => \DI\autowire(\SRC\Room\Adapters\Gateways\FinderByIdentifier::class),

            \SRC\Room\Adapters\Gateways\FindAllUnit::class => \DI\autowire(\SRC\Room\Infra\Repository\FindAll::class),
            \SRC\Room\Infra\Repository\FindAll::class => \DI\autowire(\SRC\Room\Infra\Repository\FindAll::class),
            \SRC\Room\Adapters\Presenters\FindAllVM::class => \DI\autowire(\SRC\Room\Infra\ViewModel\FindAll::class),
            \SRC\Room\Adapters\Gateways\FindAll::class => \DI\autowire(\SRC\Room\Adapters\Gateways\FindAll::class),

            \SRC\Room\Adapters\Gateways\DestroyUnit::class => \DI\autowire(\SRC\Room\Infra\Repository\Destroy::class),
            \SRC\Room\Adapters\Gateways\Destroy::class => \DI\autowire(\SRC\Room\Adapters\Gateways\Destroy::class),

            \SRC\Room\Adapters\Gateways\UpdateUnit::class => \DI\autowire(\SRC\Room\Infra\Repository\Update::class),
            \SRC\Room\Adapters\Gateways\Update::class => \DI\autowire(\SRC\Room\Adapters\Gateways\Update::class),

            // Room Price
            \SRC\RoomCoin\Adapters\Gateways\RegisterUnit::class => \DI\autowire(\SRC\RoomCoin\Infra\Repository\Register::class),
            \SRC\RoomCoin\Adapters\Presenters\RegisterVM::class => \DI\autowire(\SRC\RoomCoin\Infra\ViewModel\Register::class),
            \SRC\RoomCoin\Infra\Validator\Register::class => \DI\autowire(\SRC\RoomCoin\Infra\Validator\Register::class),
            \SRC\RoomCoin\Adapters\Gateways\Register::class => \DI\autowire(\SRC\RoomCoin\Adapters\Gateways\Register::class),

            \SRC\RoomCoin\Adapters\Gateways\FindByIdentifierUnit::class => \DI\autowire(\SRC\RoomCoin\Infra\Repository\FindByIdentifier::class),
            \SRC\RoomCoin\Infra\Repository\FindByIdentifier::class => \DI\autowire(\SRC\RoomCoin\Infra\Repository\FindByIdentifier::class),
            \SRC\RoomCoin\Adapters\Presenters\FindByIdentifierVM::class => \DI\autowire(\SRC\RoomCoin\Infra\ViewModel\FindByIdentifier::class),
            \SRC\RoomCoin\Adapters\Gateways\FinderByIdentifier::class => \DI\autowire(\SRC\RoomCoin\Adapters\Gateways\FinderByIdentifier::class),

            \SRC\RoomCoin\Adapters\Gateways\FindAllUnit::class => \DI\autowire(\SRC\RoomCoin\Infra\Repository\FindAll::class),
            \SRC\RoomCoin\Infra\Repository\FindAll::class => \DI\autowire(\SRC\RoomCoin\Infra\Repository\FindAll::class),
            \SRC\RoomCoin\Adapters\Presenters\FindAllVM::class => \DI\autowire(\SRC\RoomCoin\Infra\ViewModel\FindAll::class),
            \SRC\RoomCoin\Adapters\Gateways\FindAll::class => \DI\autowire(\SRC\RoomCoin\Adapters\Gateways\FindAll::class),

            \SRC\RoomCoin\Adapters\Gateways\DestroyUnit::class => \DI\autowire(\SRC\RoomCoin\Infra\Repository\Destroy::class),
            \SRC\RoomCoin\Adapters\Gateways\Destroy::class => \DI\autowire(\SRC\RoomCoin\Adapters\Gateways\Destroy::class),

            \SRC\RoomCoin\Adapters\Gateways\UpdateUnit::class => \DI\autowire(\SRC\RoomCoin\Infra\Repository\Update::class),
            \SRC\RoomCoin\Adapters\Gateways\Update::class => \DI\autowire(\SRC\RoomCoin\Adapters\Gateways\Update::class),

            // Tariff Calculation
            TariffCalculationByRoomUnit::class => \DI\autowire(TariffCalculationByRoom::class),
            \SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoom::class => \DI\autowire(\SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoom::class),
            GetCurrentExchangeUnit::class => \DI\autowire(GetCurrentExchange::class),
            GetCurrentExchangeValue::class => \DI\autowire(GetCurrentExchangeValue::class),
            PresenterVMByRoom::class => \DI\autowire(\SRC\TariffCalculation\Infra\ViewModel\TariffCalculationByRoom::class),
            PresenterByRoom::class => \DI\autowire(PresenterByRoom::class),

            // User
            \SRC\User\Adapters\Gateways\RegisterUnit::class => \DI\autowire(\SRC\User\Infra\Repository\Register::class),
            \SRC\User\Adapters\Presenters\RegisterVM::class => \DI\autowire(\SRC\User\Infra\ViewModel\Register::class),
            \SRC\User\Infra\Validator\Register::class => \DI\autowire(\SRC\User\Infra\Validator\Register::class),
            \SRC\User\Adapters\Gateways\Register::class => \DI\autowire(\SRC\User\Adapters\Gateways\Register::class),

            \SRC\User\Adapters\Gateways\FindByIdentifierUnit::class => \DI\autowire(\SRC\User\Infra\Repository\FindByIdentifier::class),
            \SRC\User\Infra\Repository\FindByIdentifier::class => \DI\autowire(\SRC\User\Infra\Repository\FindByIdentifier::class),
            \SRC\User\Adapters\Presenters\FindByIdentifierVM::class => \DI\autowire(\SRC\User\Infra\ViewModel\FindByIdentifier::class),
            \SRC\User\Adapters\Gateways\FinderByIdentifier::class => \DI\autowire(\SRC\User\Adapters\Gateways\FinderByIdentifier::class),

            \SRC\User\Adapters\Gateways\FindAllUnit::class => \DI\autowire(\SRC\User\Infra\Repository\FindAll::class),
            \SRC\User\Infra\Repository\FindAll::class => \DI\autowire(\SRC\User\Infra\Repository\FindAll::class),
            \SRC\User\Adapters\Presenters\FindAllVM::class => \DI\autowire(\SRC\User\Infra\ViewModel\FindAll::class),
            \SRC\User\Adapters\Gateways\FindAll::class => \DI\autowire(\SRC\User\Adapters\Gateways\FindAll::class),

            \SRC\User\Adapters\Gateways\DestroyUnit::class => \DI\autowire(\SRC\User\Infra\Repository\Destroy::class),
            \SRC\User\Adapters\Gateways\Destroy::class => \DI\autowire(\SRC\User\Adapters\Gateways\Destroy::class),

            \SRC\User\Adapters\Gateways\UpdateUnit::class => \DI\autowire(\SRC\User\Infra\Repository\Update::class),
            \SRC\User\Adapters\Gateways\Update::class => \DI\autowire(\SRC\User\Adapters\Gateways\Update::class),

            // Seller
            \SRC\Seller\Adapters\Gateways\RegisterUnit::class => \DI\autowire(\SRC\Seller\Infra\Repository\Register::class),
            \SRC\Seller\Adapters\Presenters\RegisterVM::class => \DI\autowire(\SRC\Seller\Infra\ViewModel\Register::class),
            \SRC\Seller\Infra\Validator\Register::class => \DI\autowire(\SRC\Seller\Infra\Validator\Register::class),
            \SRC\Seller\Adapters\Gateways\Register::class => \DI\autowire(\SRC\Seller\Adapters\Gateways\Register::class),

            \SRC\Seller\Adapters\Gateways\FindByIdentifierUnit::class => \DI\autowire(\SRC\Seller\Infra\Repository\FindByIdentifier::class),
            \SRC\Seller\Infra\Repository\FindByIdentifier::class => \DI\autowire(\SRC\Seller\Infra\Repository\FindByIdentifier::class),
            \SRC\Seller\Adapters\Presenters\FindByIdentifierVM::class => \DI\autowire(\SRC\Seller\Infra\ViewModel\FindByIdentifier::class),
            \SRC\Seller\Adapters\Gateways\FinderByIdentifier::class => \DI\autowire(\SRC\Seller\Adapters\Gateways\FinderByIdentifier::class),

            \SRC\Seller\Adapters\Gateways\FindAllUnit::class => \DI\autowire(\SRC\Seller\Infra\Repository\FindAll::class),
            \SRC\Seller\Infra\Repository\FindAll::class => \DI\autowire(\SRC\Seller\Infra\Repository\FindAll::class),
            \SRC\Seller\Adapters\Presenters\FindAllVM::class => \DI\autowire(\SRC\Seller\Infra\ViewModel\FindAll::class),
            \SRC\Seller\Adapters\Gateways\FindAll::class => \DI\autowire(\SRC\Seller\Adapters\Gateways\FindAll::class),

            \SRC\Seller\Adapters\Gateways\DestroyUnit::class => \DI\autowire(\SRC\Seller\Infra\Repository\Destroy::class),
            \SRC\Seller\Adapters\Gateways\Destroy::class => \DI\autowire(\SRC\Seller\Adapters\Gateways\Destroy::class),

            \SRC\Seller\Adapters\Gateways\UpdateUnit::class => \DI\autowire(\SRC\Seller\Infra\Repository\Update::class),
            \SRC\Seller\Adapters\Gateways\Update::class => \DI\autowire(\SRC\Seller\Adapters\Gateways\Update::class),

            // Booking
            \SRC\Booking\Adapters\Gateways\RegisterUnit::class => \DI\autowire(\SRC\Booking\Infra\Repository\Register::class),
            \SRC\Booking\Adapters\Presenters\RegisterVM::class => \DI\autowire(\SRC\Booking\Infra\ViewModel\Register::class),
            \SRC\Booking\Infra\Validator\Register::class => \DI\autowire(\SRC\Booking\Infra\Validator\Register::class),
            \SRC\Booking\Adapters\Gateways\Register::class => \DI\autowire(\SRC\Booking\Adapters\Gateways\Register::class),
            \SRC\Booking\Infra\Factory\TariffCalculationFactory::class => \DI\autowire(\SRC\Booking\Infra\Factory\TariffCalculationFactory::class),

            \SRC\Booking\Adapters\Gateways\DestroyUnit::class => \DI\autowire(\SRC\Booking\Infra\Repository\Destroy::class),
            \SRC\Booking\Adapters\Gateways\Destroy::class => \DI\autowire(\SRC\Booking\Adapters\Gateways\Destroy::class),

            \SRC\Booking\Adapters\Gateways\FindByIdentifierUnit::class => \DI\autowire(\SRC\Booking\Infra\Repository\FindByIdentifier::class),
            \SRC\Booking\Infra\Repository\FindByIdentifier::class => \DI\autowire(\SRC\Booking\Infra\Repository\FindByIdentifier::class),
            \SRC\Booking\Adapters\Presenters\FindByIdentifierVM::class => \DI\autowire(\SRC\Booking\Infra\ViewModel\FindByIdentifier::class),
            \SRC\Booking\Adapters\Gateways\FinderByIdentifier::class => \DI\autowire(\SRC\Booking\Adapters\Gateways\FinderByIdentifier::class),

            \SRC\Booking\Adapters\Gateways\FindAllUnit::class => \DI\autowire(\SRC\Booking\Infra\Repository\FindAll::class),
            \SRC\Booking\Infra\Repository\FindAll::class => \DI\autowire(\SRC\Booking\Infra\Repository\FindAll::class),
            \SRC\Booking\Adapters\Presenters\FindAllVM::class => \DI\autowire(\SRC\Booking\Infra\ViewModel\FindAll::class),
            \SRC\Booking\Adapters\Gateways\FindAll::class => \DI\autowire(\SRC\Booking\Adapters\Gateways\FindAll::class),
        ]);

        $container = $containerBuild->build();

        $container->set('database', function() {
            return (new MySQLConnection())->getConnection();
        });

        return $container;
    }
}