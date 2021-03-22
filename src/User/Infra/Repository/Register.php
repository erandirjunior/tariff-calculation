<?php

namespace SRC\User\Infra\Repository;

use SRC\User\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(string $name, string $email): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (name, email) VALUE (?, ?)');
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function checkIfEmailIsInUse(string $email): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM user WHERE email = ?');
        $stmt->bindValue(1, $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}