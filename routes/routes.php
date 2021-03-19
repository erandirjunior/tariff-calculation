<?php

$app = \Slim\Factory\AppFactory::createFromContainer($container);

$app->group('/coins', function (\Slim\Routing\RouteCollectorProxy $group) {
    $group->get('/{id:[0-9]+}', \SRC\Coin\Infra\Http\FinderByIdentifier::class);

    $group->get('', \SRC\Coin\Infra\Http\FindAll::class);

    $group->post('', \SRC\Coin\Infra\Http\Register::class);

    $group->delete('/{id:[0-9]+}', \SRC\Coin\Infra\Http\Destroy::class);

    $group->put('/{id:[0-9]+}', \SRC\Coin\Infra\Http\Update::class);
});


$app->run();