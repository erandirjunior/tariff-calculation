<?php

namespace SRC\Booking\Infra\Repository;

use SRC\Booking\Adapters\Gateways\FindByIdentifierUnit;

class FindByIdentifier implements FindByIdentifierUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $userId, int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM booking WHERE user_id = ? AND id = ?');
        $stmt->bindValue(1, $userId);
        $stmt->bindValue(2, $id);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }
}