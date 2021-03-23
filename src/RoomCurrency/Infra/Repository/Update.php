<?php

namespace SRC\RoomCurrency\Infra\Repository;

use SRC\RoomCurrency\Adapters\Gateways\UpdateUnit;

class Update implements UpdateUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function update(int $roomId, int $currencyId, float $price, int $id, int $hotelId): bool
    {
        $sql = 'UPDATE room_currency SET price = ?, currency_id = ? WHERE id = ? AND room_id = ? AND hotel_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $price);
        $stmt->bindValue(2, $currencyId);
        $stmt->bindValue(3, $id);
        $stmt->bindValue(4, $roomId);
        $stmt->bindValue(5, $hotelId);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }

    public function checkIfRoomPriceExists(int $roomId, int $id, int $hotelId): bool
    {
        $finder = new FindByIdentifier($this->pdo);
        return !!$finder->find($roomId, $id, $hotelId);
    }

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $currencyId, int $id, int $hotelId): bool
    {
        $sql = 'SELECT id FROM room_currency WHERE room_id = ? AND id <> ? AND currency_id = ? AND hotel_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $roomId);
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $currencyId);
        $stmt->bindValue(4, $hotelId);
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