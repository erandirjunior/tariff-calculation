<?php

namespace SRC\Room\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $hotelId, int $id): bool;
}