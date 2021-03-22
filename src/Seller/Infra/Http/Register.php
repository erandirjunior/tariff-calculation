<?php

namespace SRC\Seller\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\Seller\Adapters\Presenters\RegisterVM;

class Register extends Action
{
    public function __construct(
        private RegisterVM $registerVM,
        private \SRC\Seller\Adapters\Gateways\Register $repository,
        private \SRC\Seller\Infra\Validator\Register $registerValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->registerValidator->validate($this->body);
        $presenter = new \SRC\Seller\Adapters\Presenters\Register($this->registerVM);
        $controller = new \SRC\Seller\Adapters\Controllers\Register(
            $presenter,
            $this->repository
        );
        $controller->handle($this->body['name'], $this->body['profitMargin']);

        return JsonResponse::build(201, $presenter->getData());
    }
}