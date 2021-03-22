<?php

namespace SRC\Saller\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $id): bool;
}