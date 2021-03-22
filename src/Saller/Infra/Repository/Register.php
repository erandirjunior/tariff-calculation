<?php

namespace SRC\Saller\Infra\Repository;

use SRC\Saller\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(string $name, float $profitMargin): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO saller (name, profit_margin) VALUE (?, ?)');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $profitMargin);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function checkIfNameIsInUse(string $money): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM saller WHERE name = ?');
        $stmt->bindValue(1, $money);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}