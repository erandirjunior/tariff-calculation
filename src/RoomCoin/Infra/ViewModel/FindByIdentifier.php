<?php

namespace SRC\RoomCoin\Infra\ViewModel;

use SRC\RoomCoin\Adapters\Presenters\FindByIdentifierVM;

class FindByIdentifier implements FindByIdentifierVM
{
    public function __construct(private array $data = [])
    {}

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(int $roomId, int $coinId, int $id): void
    {
        $this->data = [
            'roomId' => $roomId,
            'coinId' => $coinId,
            'id' => $id
        ];
    }
}