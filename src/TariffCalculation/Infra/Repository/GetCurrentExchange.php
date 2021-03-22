<?php

namespace SRC\TariffCalculation\Infra\Repository;

use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeUnit;

class GetCurrentExchange implements GetCurrentExchangeUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function getValue(string $coin): float
    {
        $currentDate = date('Y-m-d');
        $sql = 'SELECT value FROM current_exchange WHERE created = ? AND coin = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $currentDate);
        $stmt->bindValue(2, $coin);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return $data['value'];
        }

        $this->saveCurrentExchange($currentDate, $coin);
        return $this->getValue($coin);
    }

    private function saveCurrentExchange($currentDate, string $coin)
    {
        $value = (new \SRC\TariffCalculation\Infra\ExternalService\GetCurrentExchange())
            ->getValue($coin);
        $sql = 'INSERT INTO current_exchange (value, coin, created) VALUE (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $value);
        $stmt->bindValue(2, $coin);
        $stmt->bindValue(3, $currentDate);
        $stmt->execute();
    }
}