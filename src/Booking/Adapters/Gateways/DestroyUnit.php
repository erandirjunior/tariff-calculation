<?php

namespace SRC\Booking\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $id): bool;
}