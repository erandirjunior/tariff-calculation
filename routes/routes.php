<?php

$app = \Slim\Factory\AppFactory::createFromContainer($container);

$app->group('/users', function (\Slim\Routing\RouteCollectorProxy $group) {
    $group->get('/{id:[0-9]+}', \SRC\User\Infra\Http\FinderByIdentifier::class);

    $group->get('', \SRC\User\Infra\Http\FindAll::class);

    $group->post('', \SRC\User\Infra\Http\Register::class);

    $group->delete('/{id:[0-9]+}', \SRC\User\Infra\Http\Destroy::class);

    $group->put('/{id:[0-9]+}', \SRC\User\Infra\Http\Update::class);

    $group->group('/{userId:[0-9]+}/bookings', function (\Slim\Routing\RouteCollectorProxy $group) {
        $group->get('', \SRC\Booking\Infra\Http\FindAll::class);

        $group->get('/{id:[0-9]+}', \SRC\Booking\Infra\Http\FinderByIdentifier::class);

        $group->post('', \SRC\Booking\Infra\Http\Register::class);

        $group->delete('/{id:[0-9]+}', \SRC\Booking\Infra\Http\Destroy::class);
    });
});

$app->group('/sellers', function (\Slim\Routing\RouteCollectorProxy $group) {
    $group->get('/{id:[0-9]+}', \SRC\Seller\Infra\Http\FinderByIdentifier::class);

    $group->get('', \SRC\Seller\Infra\Http\FindAll::class);

    $group->post('', \SRC\Seller\Infra\Http\Register::class);

    $group->delete('/{id:[0-9]+}', \SRC\Seller\Infra\Http\Destroy::class);

    $group->put('/{id:[0-9]+}', \SRC\Seller\Infra\Http\Update::class);
});

$app->group('/coins', function (\Slim\Routing\RouteCollectorProxy $group) {
    $group->get('/{id:[0-9]+}', \SRC\Coin\Infra\Http\FinderByIdentifier::class);

    $group->get('', \SRC\Coin\Infra\Http\FindAll::class);

    $group->post('', \SRC\Coin\Infra\Http\Register::class);

    $group->delete('/{id:[0-9]+}', \SRC\Coin\Infra\Http\Destroy::class);

    $group->put('/{id:[0-9]+}', \SRC\Coin\Infra\Http\Update::class);
});

$app->group('/hotels', function (\Slim\Routing\RouteCollectorProxy $group) {
    $group->get('/{id:[0-9]+}', \SRC\Hotel\Infra\Http\FinderByIdentifier::class);

    $group->get('', \SRC\Hotel\Infra\Http\FindAll::class);

    $group->post('', \SRC\Hotel\Infra\Http\Register::class);

    $group->delete('/{id:[0-9]+}', \SRC\Hotel\Infra\Http\Destroy::class);

    $group->put('/{id:[0-9]+}', \SRC\Hotel\Infra\Http\Update::class);

    $group->group('/{hotelId:[0-9]+}/rooms', function (\Slim\Routing\RouteCollectorProxy $group) {
        $group->get('/{id:[0-9]+}', \SRC\Room\Infra\Http\FinderByIdentifier::class);

        $group->get('', \SRC\Room\Infra\Http\FindAll::class);

        $group->post('', \SRC\Room\Infra\Http\Register::class);

        $group->delete('/{id:[0-9]+}', \SRC\Room\Infra\Http\Destroy::class);

        $group->put('/{id:[0-9]+}', \SRC\Room\Infra\Http\Update::class);

        $group->post('/{id:[0-9]+}/prices',
            \SRC\TariffCalculation\Infra\Http\TariffCalculationByRoom::class);

        $group->group('/{roomId:[0-9]+}/coins', function (\Slim\Routing\RouteCollectorProxy $group) {
            $group->get('/{id:[0-9]+}', \SRC\RoomCoin\Infra\Http\FinderByIdentifier::class);

            $group->get('', \SRC\RoomCoin\Infra\Http\FindAll::class);

            $group->post('', \SRC\RoomCoin\Infra\Http\Register::class);

            $group->delete('/{id:[0-9]+}', \SRC\RoomCoin\Infra\Http\Destroy::class);

            $group->put('/{id:[0-9]+}', \SRC\RoomCoin\Infra\Http\Update::class);
        });
    });
});


$app->run();