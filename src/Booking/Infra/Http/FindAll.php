<?php

namespace SRC\Booking\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Booking\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\Booking\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Booking\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\Booking\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle($this->args['userId']);
        return JsonResponse::build(200, $presenter->getData());
    }
}