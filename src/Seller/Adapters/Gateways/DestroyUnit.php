<?php

namespace SRC\Seller\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $id): bool;
}