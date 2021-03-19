<?php

namespace SRC\Coin\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Update extends Action
{
    public function __construct(
        private \SRC\Coin\Adapters\Gateways\Update $update,
        private \SRC\Coin\Infra\Validator\Update $updateValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->updateValidator->validate($this->body);
        $controller = new \SRC\Coin\Adapters\Controllers\Update(
            $this->update
        );

        $controller->handle($this->body['money'], $this->body['profitMargin'], $this->args['id']);

        return JsonResponse::build(204, null);
    }
}