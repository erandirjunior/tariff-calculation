<?php

namespace SRC\Coin\Infra\Repository;

use SRC\Coin\Adapters\Gateways\DestroyUnit;

class Destroy implements DestroyUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function destroy(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM coin WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt === 1;
    }
}