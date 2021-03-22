<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\DestroyUnit;

class Destroy implements DestroyUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function destroy(int $roomId, int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM room_coin WHERE id = ? AND room_id = ?');
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $roomId);
        $stmt->execute();
        return $stmt === 1;
    }
}