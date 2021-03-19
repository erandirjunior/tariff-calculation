<?php

namespace SRC\Hotel\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $id): bool;
}