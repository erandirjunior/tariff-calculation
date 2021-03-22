<?php

namespace SRC\User\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $id): bool;
}