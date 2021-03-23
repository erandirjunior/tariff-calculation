<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\FindByIdentifierUnit;

class FindByIdentifier implements FindByIdentifierUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $roomId, int $id, int $hotelId): array
    {
        $sql = 'SELECT * FROM room_coin WHERE id = ? AND room_id = ? AND hotel_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $roomId);
        $stmt->bindValue(3, $hotelId);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }
}