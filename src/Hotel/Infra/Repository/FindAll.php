<?php

namespace SRC\Hotel\Infra\Repository;

use SRC\Hotel\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(): array
    {
        $stmt = $this->pdo->query('SELECT id, name FROM hotel');

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}