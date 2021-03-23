<?php

namespace SRC\Booking\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $id): bool;
}