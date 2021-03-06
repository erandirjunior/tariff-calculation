<?php

namespace Config\Response;

use Psr\Http\Message\ResponseInterface;

class JsonResponse
{
    public static function build(int|string $needed, array|string|null $content = '', string $status = 'success'): ResponseInterface
    {
        return (new Json())->response($needed, $content, $status);
    }
}