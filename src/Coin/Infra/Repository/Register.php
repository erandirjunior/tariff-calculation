<?php

namespace SRC\Coin\Infra\Repository;

use SRC\Coin\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(string $money, float $profitMargin): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO coin (money, profit_margin) VALUE (?, ?)');
        $stmt->bindValue(1, $money);
        $stmt->bindValue(2, $profitMargin);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function checkIfMoneyIsInUse(string $money): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM coin WHERE money = ?');
        $stmt->bindValue(1, $money);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}