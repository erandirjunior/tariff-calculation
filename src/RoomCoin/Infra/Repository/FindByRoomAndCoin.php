<?php

namespace SRC\RoomCoin\Infra\Repository;

class FindByRoomAndCoin
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $roomId, int $coinId, int $hotelId): array
    {
        $sql = 'SELECT id, room_id, coin_id, price FROM room_coin WHERE coin_id = ? AND room_id = ? AND hotel_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $coinId);
        $stmt->bindValue(2, $roomId);
        $stmt->bindValue(3, $hotelId);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }
}