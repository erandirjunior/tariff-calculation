<?php

namespace SRC\Hotel\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Update extends Action
{
    public function __construct(
        private \SRC\Hotel\Adapters\Gateways\Update $update,
        private \SRC\Hotel\Infra\Validator\Update $updateValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->updateValidator->validate($this->body);
        $controller = new \SRC\Hotel\Adapters\Controllers\Update(
            $this->update
        );

        $controller->handle($this->body['name'], $this->args['id']);

        return JsonResponse::build(204, null);
    }
}