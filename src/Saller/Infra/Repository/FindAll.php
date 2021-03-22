<?php

namespace SRC\Saller\Infra\Repository;

use SRC\Saller\Adapters\Gateways\FindAllUnit;

class FindAll implements FindAllUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(): array
    {
        $stmt = $this->pdo->query('SELECT id, name, profit_margin FROM saller');

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}