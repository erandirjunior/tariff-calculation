<?php

namespace SRC\Currency\Adapters\Gateways;

use SRC\Currency\Domain\Destruction\DestroyerGateway;

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