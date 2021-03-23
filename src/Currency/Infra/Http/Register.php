<?php

namespace SRC\Currency\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Currency\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\Currency\Adapters\Gateways\Register $repository,
        private \SRC\Currency\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\Currency\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\Currency\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle($this->body['currency'], $this->body['profitMargin']);

        return JsonResponse::build(201, $presenter->getData());
    }
}