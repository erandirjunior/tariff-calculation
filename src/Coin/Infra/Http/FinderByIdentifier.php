<?php

namespace SRC\Coin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Coin\Adapters\Controllers\FindByIdentifier;
use SRC\Coin\Adapters\Presenters\FindByIdentifierVM;

class FinderByIdentifier extends Action
{
    public function __construct(
        private FindByIdentifierVM $byIdentifierVM,
        private \SRC\Coin\Adapters\Gateways\FinderByIdentifier $finderByIdentifier
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Coin\Adapters\Presenters\FindByIdentifier($this->byIdentifierVM);
        $controller = new FindByIdentifier(
            $presenter,
            $this->finderByIdentifier
        );

        $controller->handle($this->args['id']);
        return JsonResponse::build(200, $presenter->getData());
    }
}