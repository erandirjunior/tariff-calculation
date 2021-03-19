<?php

namespace SRC\Coin\Adapters\Gateways;

use SRC\Coin\Domain\Destruction\DestroyerGateway;

class Destroy implements DestroyerGateway
{
    public function __construct(private DestroyUnit $destructionUnit)
    {
    }

    public function destroy(int $id): bool
    {
        return $this->destructionUnit->destroy($id);
    }
}