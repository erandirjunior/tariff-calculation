<?php

namespace SRC\Coin\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $id): bool;
}