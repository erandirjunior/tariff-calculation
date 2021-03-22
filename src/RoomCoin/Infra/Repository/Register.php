<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(int $roomId, int $coinId, float $price): int
    {
        $sql = 'INSERT INTO room_coin (room_id, coin_id, price) VALUE (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $coinId);
        $stmt->bindValue(3, $price);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function find(int $roomId, int $id): array
    {
        return (new FindByIdentifier($this->pdo))->find($roomId, $id);
    }

    public function roomPrice(int $roomId, int $coinId): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM room_coin WHERE room_id = ? AND coin_id = ?');
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $coinId);
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