<?php

namespace SRC\RoomCurrency\Infra\Repository;

class FindByRoomAndCurrency
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $roomId, int $currencyId, int $hotelId): array
    {
        $sql = 'SELECT id, room_id, currency_id, price FROM room_currency WHERE currency_id = ? AND room_id = ? AND hotel_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $currencyId);
        $stmt->bindValue(2, $roomId);
        $stmt->bindValue(3, $hotelId);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }
}