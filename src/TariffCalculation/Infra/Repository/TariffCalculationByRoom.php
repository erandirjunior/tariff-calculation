<?php

namespace SRC\TariffCalculation\Infra\Repository;

use SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoomUnit;

class TariffCalculationByRoom implements TariffCalculationByRoomUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function getRoomPriceByCoin(int $roomId, int $coinId): array
    {
        $sql = 'SELECT price FROM room_coin WHERE room_id = ? AND coin_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $coinId);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data ? $data : [];
    }

    public function getProfitMarginByCoinRequested(int $coinId): array
    {
        $sql = 'SELECT profit_margin FROM coin WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $coinId);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data ? $data : [];
    }

    public function getMoney(int $coinId): array
    {
        $sql = 'SELECT money FROM coin WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $coinId);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data ? $data : [];
    }
}