<?php

namespace SRC\TariffCalculation\Infra\Repository;

use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeUnit;

class GetCurrentExchange implements GetCurrentExchangeUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function getValue(string $currency): float
    {
        $currentDate = date('Y-m-d');
        $sql = 'SELECT value FROM current_exchange WHERE created = ? AND currency = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $currentDate);
        $stmt->bindValue(2, $currency);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return $data['value'];
        }

        $this->saveCurrentExchange($currentDate, $currency);
        return $this->getValue($currency);
    }

    private function saveCurrentExchange($currentDate, string $currency)
    {
        $value = (new \SRC\TariffCalculation\Infra\ExternalService\GetCurrentExchange())
            ->getValue($currency);
        $sql = 'INSERT INTO current_exchange (value, currency, created) VALUE (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $value);
        $stmt->bindValue(2, $currency);
        $stmt->bindValue(3, $currentDate);
        $stmt->execute();
    }
}