<?php

namespace SRC\Currency\Infra\Repository;

use SRC\Currency\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(string $currency, float $profitMargin): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO currency (currency, profit_margin) VALUE (?, ?)');
        $stmt->bindValue(1, $currency);
        $stmt->bindValue(2, $profitMargin);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function checkIfCurrencyIsInUse(string $currency): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM currency WHERE currency = ?');
        $stmt->bindValue(1, $currency);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}