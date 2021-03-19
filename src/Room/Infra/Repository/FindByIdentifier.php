<?php

namespace SRC\Room\Infra\Repository;

use SRC\Room\Adapters\Gateways\FindByIdentifierUnit;

class FindByIdentifier implements FindByIdentifierUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $hotelId, int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT id, room, hotel_id FROM room WHERE id = ? AND hotel_id = ?');
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $hotelId);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }
}