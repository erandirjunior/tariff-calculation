<?php

namespace SRC\User\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use SRC\User\Adapters\Gateways\DestructionUnit;
use SRC\User\Adapters\Presenters\DestroyVM;
use SRC\User\Infra\Validator\Code;

class Destroy extends Action
{
    public function __construct(
        private \SRC\User\Adapters\Gateways\Destroy $destroy
    )
    {}

    public function handle(): ResponseInterface
    {
        $controller = new \SRC\User\Adapters\Controllers\Destroy(
            $this->destroy
        );

        $controller->handle($this->args['id']);

        return JsonResponse::build(204, null);
    }
}