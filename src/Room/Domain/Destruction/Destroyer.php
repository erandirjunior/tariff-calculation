<?php

namespace SRC\Room\Domain\Destruction;

class Destroyer
{
    public function __construct(
        private DestroyerGateway $destroyerGateway
    )
    {}

    public function destroy(int $hotelId, int $id): void
    {
        $this->destroyerGateway->destroy($hotelId, $id);
    }
}