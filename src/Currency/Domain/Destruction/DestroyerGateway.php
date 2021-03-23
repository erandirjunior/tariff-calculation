<?php

namespace SRC\Currency\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $id): bool;
}