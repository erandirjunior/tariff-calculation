<?php

namespace SRC\RoomCoin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\RoomCoin\Adapters\Controllers\FindByIdentifier;
use SRC\RoomCoin\Adapters\Presenters\FindByIdentifierVM;

class FinderByIdentifier extends Action
{
    public function __construct(
        private FindByIdentifierVM $byIdentifierVM,
        private \SRC\RoomCoin\Adapters\Gateways\FinderByIdentifier $finderByIdentifier
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\RoomCoin\Adapters\Presenters\FindByIdentifier($this->byIdentifierVM);
        $controller = new FindByIdentifier(
            $presenter,
            $this->finderByIdentifier
        );

        $controller->handle($this->args['roomId'], $this->args['id']);
        return JsonResponse::build(200, $presenter->getData());
    }
}