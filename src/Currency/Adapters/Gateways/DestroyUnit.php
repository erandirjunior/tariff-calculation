<?php

namespace SRC\Currency\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $id): bool;
}