<?php

namespace SRC\User\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $id): bool;
}