<?php

namespace SRC\Coin\Infra\Repository;

use SRC\Coin\Adapters\Gateways\FindByIdentifierUnit;

class FindByIdentifier implements FindByIdentifierUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT id, money, profit_margin FROM coin WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }
}