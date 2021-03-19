<?php

namespace SRC\Room\Infra\Repository;

use SRC\Room\Adapters\Gateways\DestroyUnit;

class Destroy implements DestroyUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function destroy(int $hotelId, int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM room WHERE id = ? AND hotel_id = ?');
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $hotelId);
        $stmt->execute();
        return $stmt === 1;
    }
}