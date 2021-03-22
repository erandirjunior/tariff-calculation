<?php

namespace SRC\User\Infra\Repository;

use SRC\User\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(): array
    {
        $stmt = $this->pdo->query('SELECT id, name, email FROM user');

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}