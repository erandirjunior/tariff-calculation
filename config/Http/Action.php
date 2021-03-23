<?php

namespace Config\Http;

use Config\Response\Json;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class Action
{
    protected array|null|object $body;
    protected array$args;

    public function __invoke(ServerRequestInterface $request, Response $response, array $args = []): ResponseInterface
    {
        try {
            $this->body = $request->getParsedBody();
            $this->args = $args;

            if (in_array("application/json", $request->getHeader("Content-Type"))) {
                $this->body = json_decode(file_get_contents('php://input'), true);
            }

            return $this->handle();
        } catch (\DomainException|\InvalidArgumentException $exception) {
            return (new Json())->response(422, $exception->getMessage(), 'fail');
        } catch (\Exception $e) {
            return (new Json())->response(500, 'Internal error!', 'error');
        }
    }

    abstract public function handle(): ResponseInterface;
}