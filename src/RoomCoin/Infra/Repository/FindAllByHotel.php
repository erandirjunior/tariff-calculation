<?php

namespace SRC\RoomCoin\Infra\Repository;

use SRC\RoomCoin\Adapters\Gateways\FindAllByHotelUnit;

class FindAllByHotel implements FindAllByHotelUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function find(int $hotelId): array
    {
        $sql = "SELECT
                    rc.id, room_id, coin_id, price
                FROM
                    room_coin rc
                    INNER JOIN room r ON rc.room_id = r.id
                WHERE
                    r.hotel_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $hotelId);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}