<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $roomId): array
    {
        $stmt = $this->pdo->prepare('SELECT id, room_id, coin_id, price FROM room_coin WHERE room_id = ?');
        $stmt->bindValue(1, $roomId);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}