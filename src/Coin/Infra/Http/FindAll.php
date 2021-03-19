<?php

namespace SRC\Coin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Coin\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\Coin\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Coin\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\Coin\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle();
        return JsonResponse::build(200, $presenter->getData());
    }
}