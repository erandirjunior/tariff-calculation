<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $roomId, int $hotelId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM room_coin WHERE room_id = ? AND hotel_id = ?');
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $hotelId);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}