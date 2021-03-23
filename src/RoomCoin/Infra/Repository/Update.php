<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(int $roomId, int $coinId, float $price, int $id, int $hotelId): bool
    {
        $sql = 'UPDATE room_coin SET price = ?, coin_id = ? WHERE id = ? AND room_id = ? AND hotel_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $price);
        $stmt->bindValue(2, $coinId);
        $stmt->bindValue(3, $id);
        $stmt->bindValue(4, $roomId);
        $stmt->bindValue(5, $hotelId);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }

    public function checkIfRoomPriceExists(int $roomId, int $id, int $hotelId): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($roomId, $id, $hotelId);
    }

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $coinId, int $id, int $hotelId): bool
    {
        $sql = 'SELECT id FROM room_coin WHERE room_id = ? AND id <> ? AND coin_id = ? AND hotel_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $coinId);
        $stmt->bindValue(4, $hotelId);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function checkIfCoinExists(int $coinId): bool
    {
        $room = (new \SRC\Coin\Infra\Repository\FindByIdentifier($this->pdo))
            ->find($coinId);
        return !!$room;
    }
}