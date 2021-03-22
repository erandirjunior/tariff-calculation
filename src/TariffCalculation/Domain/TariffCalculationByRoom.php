<?php

namespace SRC\TariffCalculation\Domain;

class TariffCalculationByRoom
{
    public function __construct(
        private TariffCalculationByRoomGateway $tariffGateway,
        private GetCurrentExchangeValue $currentExchangeValue,
        private Presenter $presenter
    )
    {}

    public function calculate($roomId, $coinIdBase, $coinIdToConversition): void
    {
        $roomPrice = $this->tariffGateway->getRoomPriceByCoin($roomId, $coinIdBase);
        $profitMargin = $this->tariffGateway->getProfitMargin($coinIdToConversition);
        $userNeedCoin = $this->getMoney($coinIdToConversition);
        $baseCoin = $this->getMoney($coinIdBase);
        $currentExchangeBase = $this->getCurrentExchange($baseCoin);
        $currentExchangeConversion = $this->getCurrentExchange($userNeedCoin);
        $price = $this->getRoomPrice(
            $roomPrice,
            $profitMargin,
            $currentExchangeBase,
            $currentExchangeConversion
        );

        $this->presenter->setData($price);
    }

    private function getRoomPrice(
        float $roomPrice,
        float $profitMargin,
        float $currentExchangeBase,
        float $currentExchangeConversion,
    ): float
    {
        $currentExchange = $this->getValueConvertedCurrency($currentExchangeBase, $currentExchangeConversion);

        if ($profitMargin === 0) {
            return $roomPrice * $currentExchange;
        }

        $roomPrice += $roomPrice / 100 * $profitMargin;
        return $roomPrice * $currentExchange;
    }

    private function getCurrentExchange(string $money): float
    {
        return $this->currentExchangeValue->getValue($money);
    }

    private function getMoney(int $coinId): string
    {
        return $this->tariffGateway->getMoney($coinId);
    }

    private function getValueConvertedCurrency(
        float $currentExchangeBase,
        float $currentExchangeConversion
    ): float
    {
        $value = $currentExchangeBase / $currentExchangeConversion;
        return floatval(substr((string) $value, 0, 4));
    }
}