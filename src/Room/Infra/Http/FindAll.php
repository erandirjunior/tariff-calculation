<?php

namespace SRC\Room\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Room\Adapters\Presenters\FindAllVM;

class FindAll extends Action
{
    public function __construct(
        private FindAllVM $findAllVM,
        private \SRC\Room\Adapters\Gateways\FindAll $findAll
    )
    {}

    public function handle(): ResponseInterface
    {
        $presenter = new \SRC\Room\Adapters\Presenters\FindAll($this->findAllVM);
        $controller = new \SRC\Room\Adapters\Controllers\FindAll(
            $this->findAll,
            $presenter
        );

        $controller->handle($this->args['hotelId']);
        return JsonResponse::build(200, $presenter->getData());
    }
}