<?php

namespace SRC\Saller\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $id): bool;
}