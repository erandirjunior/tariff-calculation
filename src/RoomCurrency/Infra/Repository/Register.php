<?php

namespace SRC\RoomCurrency\Infra\Repository;

use SRC\RoomCurrency\Adapters\Gateways\RegisterUnit;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(int $roomId, int $currencyId, float $price, int $hotelId): int
    {
        $sql = 'INSERT INTO room_currency (room_id, currency_id, price, hotel_id) VALUE (?, ?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $currencyId);
        $stmt->bindValue(3, $price);
        $stmt->bindValue(4, $hotelId);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function roomPrice(int $roomId, int $currencyId): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM room_currency WHERE room_id = ? AND currency_id = ?');
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $currencyId);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function checkIfCurrencyExists(int $currencyId): bool
    {
        $room = (new \SRC\Currency\Infra\Repository\FindByIdentifier($this->pdo))
            ->find($currencyId);
        return !!$room;
    }
}