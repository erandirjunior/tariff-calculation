<?php

namespace SRC\Saller\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Saller\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\Saller\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Saller\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\Saller\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle();
        return JsonResponse::build(200, $presenter->getData());
    }
}