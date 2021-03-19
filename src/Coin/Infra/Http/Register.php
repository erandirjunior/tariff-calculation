<?php

namespace SRC\Coin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Coin\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\Coin\Adapters\Gateways\Register $repository,
        private \SRC\Coin\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\Coin\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\Coin\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle($this->body['money'], $this->body['profitMargin']);

        return JsonResponse::build(201, $presenter->getData());
    }
}