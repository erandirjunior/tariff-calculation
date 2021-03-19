<?php

namespace SRC\Room\Infra\ViewModel;

use SRC\Room\Adapters\Presenters\FindByIdentifierVM;

class FindByIdentifier implements FindByIdentifierVM
{
    public function __construct(private array $data = [])
    {}

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(string $room, int $id, int $hotelId): void
    {
        $this->data = [
            'room' => $room,
            'id' => $id,
            'hotel' => $hotelId
        ];
    }
}