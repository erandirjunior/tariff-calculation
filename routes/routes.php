<?php

$app = \Slim\Factory\AppFactory::createFromContainer($container);

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
    });
});


$app->run();