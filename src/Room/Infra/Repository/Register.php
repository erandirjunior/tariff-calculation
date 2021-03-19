<?php

namespace SRC\Room\Infra\Repository;

use SRC\Room\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(string $room, int $hotelId): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO room (room, hotel_id) VALUE (?, ?)');
        $stmt->bindValue(1, $room);
        $stmt->bindValue(2, $hotelId);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function find(int $hotelId, int $id): array
    {
        return (new FindByIdentifier($this->pdo))->find($hotelId, $id);
    }

    public function checkRoomIsInUse(string $room, int $hotelId): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM room WHERE room = ? AND hotel_id = ?');
        $stmt->bindValue(1, $room);
        $stmt->bindValue(2, $hotelId);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}