<?php

namespace Config\Response;

use Nyholm\Psr7\Response;

class Json
{
    public function response(int|string $needed, array|string|null $content = '')
    {
        $response = new Response($needed);
        $response->getBody()->write(json_encode(['content' => $content]));
        return $response->withHeader('Content-Type', 'application/json');
    }
}