<?php

namespace SRC\Currency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Currency\Adapters\Controllers\FindByIdentifier;
use SRC\Currency\Adapters\Presenters\FindByIdentifierVM;

class FinderByIdentifier extends Action
{
    public function __construct(
        private FindByIdentifierVM $byIdentifierVM,
        private \SRC\Currency\Adapters\Gateways\FinderByIdentifier $finderByIdentifier
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Currency\Adapters\Presenters\FindByIdentifier($this->byIdentifierVM);
        $controller = new FindByIdentifier(
            $presenter,
            $this->finderByIdentifier
        );

        $controller->handle($this->args['id']);
        return JsonResponse::build(200, $presenter->getData());
    }
}