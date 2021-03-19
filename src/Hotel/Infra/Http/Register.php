<?php

namespace SRC\Hotel\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Hotel\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\Hotel\Adapters\Gateways\Register $repository,
        private \SRC\Hotel\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\Hotel\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\Hotel\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle($this->body['name']);

        return JsonResponse::build(201, $presenter->getData());
    }
}