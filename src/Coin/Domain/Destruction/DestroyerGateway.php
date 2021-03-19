<?php

namespace SRC\Coin\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $id): bool;
}