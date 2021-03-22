<?php

namespace SRC\Saller\Infra\Repository;

use SRC\Saller\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(string $name, float $profitMargin, int $id): bool
    {
        $stmt = $this->pdo->prepare('UPDATE saller SET name = ?, profit_margin = ? WHERE id = ?');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $profitMargin);
        $stmt->bindValue(3, $id);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }


    public function checkIfSallerExists(int $id): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($id);
    }

    public function checkIfNameAreNotInUse(string $name, int $id): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM saller WHERE name = ? AND id <> ?');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}