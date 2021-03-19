<?php

namespace SRC\Room\Infra\Repository;

use SRC\Room\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(int $hotelId, string $name, int $id): bool
    {
        $stmt = $this->pdo->prepare('UPDATE room SET room = ? WHERE id = ? AND hotel_id = ?');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $hotelId);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }

    public function checkIfRoomExists(int $hotelId, int $id): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($hotelId, $id);
    }

    public function checkIfRoomAreNotInUse(int $hotelId, string $room, int $id): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM room WHERE room = ? AND id <> ? AND hotel_id = ?');
        $stmt->bindValue(1, $room);
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $hotelId);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}