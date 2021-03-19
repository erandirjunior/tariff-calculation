<?php

namespace SRC\Coin\Infra\Repository;

use SRC\Coin\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(): array
    {
        $stmt = $this->pdo->query('SELECT id, money, profit_margin FROM coin');

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}