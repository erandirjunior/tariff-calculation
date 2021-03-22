<?php

namespace SRC\Seller\Infra\Repository;

use SRC\Seller\Adapters\Gateways\DestroyUnit;

class Destroy implements DestroyUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function destroy(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM seller WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt === 1;
    }
}