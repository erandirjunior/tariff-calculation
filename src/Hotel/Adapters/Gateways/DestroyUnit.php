<?php

namespace SRC\Hotel\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $id): bool;
}