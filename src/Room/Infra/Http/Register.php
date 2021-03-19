<?php

namespace SRC\Room\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Room\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\Room\Adapters\Gateways\Register $repository,
        private \SRC\Room\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\Room\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\Room\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle($this->args['hotelId'], $this->body['room']);

        return JsonResponse::build(201, $presenter->getData());
    }
}