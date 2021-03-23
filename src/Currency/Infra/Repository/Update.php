<?php

namespace SRC\Currency\Infra\Repository;

use SRC\Currency\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(string $currency, float $profitMargin, int $id): bool
    {
        $stmt = $this->pdo->prepare('UPDATE currency SET currency = ?, profit_margin = ? WHERE id = ?');
        $stmt->bindValue(1, $currency);
        $stmt->bindValue(2, $profitMargin);
        $stmt->bindValue(3, $id);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }


    public function checkIfCurrencyExists(int $id): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($id);
    }

    public function checkIfCurrencyAreNotInUse(string $currency, int $id): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM currency WHERE currency = ? AND id <> ?');
        $stmt->bindValue(1, $currency);
        $stmt->bindValue(2, $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}