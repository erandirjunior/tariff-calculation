<?php

namespace SRC\Currency\Infra\Repository;

use SRC\Currency\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(): array
    {
        $stmt = $this->pdo->query('SELECT id, currency, profit_margin FROM currency');

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}