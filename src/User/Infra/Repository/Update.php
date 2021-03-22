<?php

namespace SRC\User\Infra\Repository;

use SRC\User\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(string $name, string $email, int $id): bool
    {
        $stmt = $this->pdo->prepare('UPDATE user SET email = ?, name = ? WHERE id = ?');
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $name);
        $stmt->bindValue(3, $id);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }


    public function checkIfEmailExists(int $id): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($id);
    }

    public function checkIfEmailAreNotInUse(string $email, int $id): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM user WHERE email = ? AND id <> ?');
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}