<?php

namespace SRC\Saller\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Update extends Action
{
    public function __construct(
        private \SRC\Saller\Adapters\Gateways\Update $update,
        private \SRC\Saller\Infra\Validator\Update $updateValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->updateValidator->validate($this->body);
        $controller = new \SRC\Saller\Adapters\Controllers\Update(
            $this->update
        );

        $controller->handle($this->body['name'], $this->body['profitMargin'], $this->args['id']);

        return JsonResponse::build(204, null);
    }
}