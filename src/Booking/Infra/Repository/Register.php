<?php

namespace SRC\Booking\Infra\Repository;

use SRC\Booking\Adapters\Gateways\RegisterUnit;
use SRC\Booking\Domain\Register\Contract;

class Register implements RegisterUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function register(Contract $contract): int
    {
        $sql = 'INSERT INTO booking
        (user_id, seller_id, hotel_id, room_id, price, created, coin_base_id, coin_conversion_id)
        VALUE (?, ?, ?, ?, ?, ?, ?, ?)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $contract->getUserId());
        $stmt->bindValue(2, $contract->getSellerId());
        $stmt->bindValue(3, $contract->getHotelId());
        $stmt->bindValue(4, $contract->getRoomId());
        $stmt->bindValue(5, $contract->getPrice());
        $stmt->bindValue(6, $contract->getDate());
        $stmt->bindValue(7, $contract->getCoinBase());
        $stmt->bindValue(8, $contract->getUserCoinNeed());
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function checkIfUseHasBookedWithOtherSeller(int $userId, int $sellerId): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM booking WHERE user_id = ? AND seller_id <> ?');
        $stmt->bindValue(1, $userId);
        $stmt->bindValue(2, $sellerId);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}