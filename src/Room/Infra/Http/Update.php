<?php

namespace SRC\Room\Infra\Http;

use Config\Http\Action;
use Config\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class Update extends Action
{
    public function __construct(
        private \SRC\Room\Adapters\Gateways\Update $update,
        private \SRC\Room\Infra\Validator\Update $updateValidator
    )
    {}

    public function handle(): ResponseInterface
    {
        $this->updateValidator->validate($this->body);
        $controller = new \SRC\Room\Adapters\Controllers\Update(
            $this->update
        );

        $controller->handle($this->args['hotelId'], $this->body['room'], $this->args['id']);

        return JsonResponse::build(204, null);
    }
}