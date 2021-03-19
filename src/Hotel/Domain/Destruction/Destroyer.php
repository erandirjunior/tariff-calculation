<?php

namespace SRC\Hotel\Domain\Destruction;

class Destroyer
{
    public function __construct(
        private DestroyerGateway $destroyerGateway
    )
    {}

    public function destroy(int $id): void
    {
        $this->destroyerGateway->destroy($id);
    }
}