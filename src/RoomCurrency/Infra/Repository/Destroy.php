<?php

namespace SRC\RoomCurrency\Infra\Repository;

use SRC\RoomCurrency\Adapters\Gateways\DestroyUnit;

class Destroy implements DestroyUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function destroy(int $roomId, int $id, int $hotelId): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM room_currency WHERE id = ? AND room_id = ? AND hotel_id = ?');
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $roomId);
        $stmt->bindValue(3, $hotelId);
        $stmt->execute();
        return $stmt === 1;
    }
}