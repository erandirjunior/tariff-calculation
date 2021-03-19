<?php

namespace SRC\Room\Infra\ViewModel;

use SRC\Room\Adapters\Presenters\FindAllVM;

class FindAll implements FindAllVM
{
    public function __construct(private array $data = [])
    {}

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(string $room, int $id, int $hotelId): void
    {
        $this->data[] = [
            'name' => $room,
            'id' => $id,
            'hotel' => $hotelId,
        ];
    }
}