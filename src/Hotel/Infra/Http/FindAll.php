<?php

namespace SRC\Hotel\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Hotel\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\Hotel\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Hotel\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\Hotel\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle();
        return JsonResponse::build(200, $presenter->getData());
    }
}