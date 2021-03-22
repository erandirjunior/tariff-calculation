<?php

namespace SRC\Seller\Infra\Repository;

use SRC\Seller\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(): array
    {
        $stmt = $this->pdo->query('SELECT id, name, profit_margin FROM seller');

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}