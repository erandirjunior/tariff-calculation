<?php

namespace SRC\Room\Infra\Repository;

use SRC\Room\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $hotelId): array
    {
        $stmt = $this->pdo->prepare('SELECT id, room, hotel_id FROM room WHERE hotel_id = ?');
        $stmt->bindValue(1, $hotelId);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}