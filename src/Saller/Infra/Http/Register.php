<?php

namespace SRC\Saller\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Saller\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\Saller\Adapters\Gateways\Register $repository,
        private \SRC\Saller\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\Saller\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\Saller\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle($this->body['name'], $this->body['profitMargin']);

        return JsonResponse::build(201, $presenter->getData());
    }
}