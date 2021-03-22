<?php

namespace SRC\Seller\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $id): bool;
}