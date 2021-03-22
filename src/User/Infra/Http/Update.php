<?php

namespace SRC\User\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Update extends Action
{
    public function __construct(
        private \SRC\User\Adapters\Gateways\Update $update,
        private \SRC\User\Infra\Validator\Update $updateValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->updateValidator->validate($this->body);
        $controller = new \SRC\User\Adapters\Controllers\Update(
            $this->update
        );

        $controller->handle($this->body['name'], $this->body['email'], $this->args['id']);

        return JsonResponse::build(204, null);
    }
}