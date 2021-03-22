<?php

namespace SRC\Saller\Infra\Repository;

use SRC\Saller\Adapters\Gateways\FindByIdentifierUnit;

class FindByIdentifier implements FindByIdentifierUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT id, name, profit_margin FROM saller WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }
}