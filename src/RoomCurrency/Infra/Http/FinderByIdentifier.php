<?php

namespace SRC\RoomCurrency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\RoomCurrency\Adapters\Controllers\FindByIdentifier;
use SRC\RoomCurrency\Adapters\Presenters\FindByIdentifierVM;

class FinderByIdentifier extends Action
{
    public function __construct(
        private FindByIdentifierVM $byIdentifierVM,
        private \SRC\RoomCurrency\Adapters\Gateways\FinderByIdentifier $finderByIdentifier
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\RoomCurrency\Adapters\Presenters\FindByIdentifier($this->byIdentifierVM);
        $controller = new FindByIdentifier(
            $presenter,
            $this->finderByIdentifier
        );

        $controller->handle($this->args['roomId'], $this->args['id'], $this->args['hotelId']);
        return JsonResponse::build(200, $presenter->getData());
    }
}