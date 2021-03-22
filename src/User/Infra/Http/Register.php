<?php

namespace SRC\User\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\User\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\User\Adapters\Gateways\Register $repository,
        private \SRC\User\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\User\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\User\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle($this->body['name'], $this->body['email']);

        return JsonResponse::build(201, $presenter->getData());
    }
}