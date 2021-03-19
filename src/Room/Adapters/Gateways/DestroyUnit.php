<?php

namespace SRC\Room\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $hotelId, int $id): bool;
}