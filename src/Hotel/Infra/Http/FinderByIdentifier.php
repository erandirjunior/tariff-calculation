<?php

namespace SRC\Hotel\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Hotel\Adapters\Controllers\FindByIdentifier;
use SRC\Hotel\Adapters\Presenters\FindByIdentifierVM;

class FinderByIdentifier extends Action
{
    public function __construct(
        private FindByIdentifierVM $byIdentifierVM,
        private \SRC\Hotel\Adapters\Gateways\FinderByIdentifier $finderByIdentifier
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Hotel\Adapters\Presenters\FindByIdentifier($this->byIdentifierVM);
        $controller = new FindByIdentifier(
            $presenter,
            $this->finderByIdentifier
        );

        $controller->handle($this->args['id']);
        return JsonResponse::build(200, $presenter->getData());
    }
}