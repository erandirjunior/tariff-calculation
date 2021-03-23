<?php

namespace Config\Response;

use Nyholm\Psr7\Response;

class Json
{
    public function response(int|string $needed, array|string|null $content = '', string $status = 'success')
    {
        $body = [
            'status' => $status,
            'data' => $content
        ];

        if ($status === 'error') {
            $body = [
                'status' => $status,
                'message' => $content
            ];
        }
        $response = new Response($needed);
        $response->getBody()->write(json_encode($body));
        return $response->withHeader('Content-Type', 'application/json');
    }
}