<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(int $roomId, int $coinId, float $price, int $id): bool
    {
        $sql = 'UPDATE room_coin SET price = ?, coin_id = ? WHERE id = ? AND room_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $price);
        $stmt->bindValue(2, $coinId);
        $stmt->bindValue(3, $id);
        $stmt->bindValue(4, $roomId);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }

    public function checkIfRoomPriceExists(int $roomId, int $id): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($roomId, $id);
    }

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $coinId, int $id): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM room_coin WHERE room_id = ? AND id <> ? AND coin_id = ?');
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $coinId);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}