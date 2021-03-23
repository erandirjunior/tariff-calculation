<?php

namespace SRC\Currency\Infra\Repository;

use SRC\Currency\Adapters\Gateways\DestroyUnit;

class Destroy implements DestroyUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function destroy(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM currency WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt === 1;
    }
}