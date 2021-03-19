<?php

namespace SRC\Coin\Infra\Repository;

use SRC\Coin\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(string $money, float $profitMargin, int $id): bool
    {
        $stmt = $this->pdo->prepare('UPDATE coin SET money = ?, profit_margin = ? WHERE id = ?');
        $stmt->bindValue(1, $money);
        $stmt->bindValue(2, $profitMargin);
        $stmt->bindValue(3, $id);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }


    public function checkIfCoinExists(int $id): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($id);
    }

    public function checkIfMoneyAreNotInUse(string $money, int $id): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM coin WHERE money = ? AND id <> ?');
        $stmt->bindValue(1, $money);
        $stmt->bindValue(2, $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}