<?php

namespace SRC\Hotel\Infra\Repository;

use SRC\Hotel\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(string $name, int $id): bool
    {
        $stmt = $this->pdo->prepare('UPDATE hotel SET name = ? WHERE id = ?');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $id);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }

    public function checkIfHotelExists(int $id): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($id);
    }

    public function checkIfNameAreNotInUse(string $name, int $id): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM hotel WHERE name = ? AND id <> ?');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}