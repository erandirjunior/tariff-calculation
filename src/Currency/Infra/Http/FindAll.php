<?php

namespace SRC\Currency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Currency\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\Currency\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Currency\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\Currency\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle();
        return JsonResponse::build(200, $presenter->getData());
    }
}