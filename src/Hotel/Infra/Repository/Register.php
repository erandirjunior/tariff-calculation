<?php

namespace SRC\Hotel\Infra\Repository;

use SRC\Hotel\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(string $name): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO hotel (name) VALUE (?)');
        $stmt->bindValue(1, $name);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function find(int $id): array
    {
        return (new FindByIdentifier($this->pdo))->find($id);
    }

    public function checkINameIsInUse(string $name): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM hotel WHERE name = ?');
        $stmt->bindValue(1, $name);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}