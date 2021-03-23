<?php

namespace SRC\Booking\Infra\Repository;

use SRC\Booking\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $userId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM booking WHERE user_id = ?');
        $stmt->bindValue(1, $userId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}