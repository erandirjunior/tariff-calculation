<?php

namespace SRC\Seller\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Seller\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\Seller\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Seller\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\Seller\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle();
        return JsonResponse::build(200, $presenter->getData());
    }
}