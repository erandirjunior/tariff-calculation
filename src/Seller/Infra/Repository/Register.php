<?php

namespace SRC\Seller\Infra\Repository;

use SRC\Seller\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(string $name, float $profitMargin): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO seller (name, profit_margin) VALUE (?, ?)');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $profitMargin);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function checkIfNameIsInUse(string $name): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM seller WHERE name = ?');
        $stmt->bindValue(1, $name);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}