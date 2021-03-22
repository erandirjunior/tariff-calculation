<?php

namespace SRC\TariffCalculation\Domain;

class TariffCalculationByRoom
{
    private FormatterValue $formatter;

    public function __construct(
        private TariffCalculationByRoomGateway $tariffGateway,
        private GetCurrentExchangeValue $currentExchangeValue,
        private Presenter $presenter
    )
    {
        $this->formatter = new FormatterValue();
    }

    public function calculate($roomId, $coinIdBase, $coinIdToConvertion, $sallerId): void
    {
        $roomPrice = $this->tariffGateway->getRoomPriceByCoin($roomId, $coinIdBase);
        $profitMargin = $this->tariffGateway->getProfitMargin($coinIdToConvertion);
        $userNeedCoin = $this->getMoney($coinIdToConvertion);
        $baseCoin = $this->getMoney($coinIdBase);
        $currentExchangeBase = $this->getCurrentExchange($baseCoin);
        $currentExchangeConversion = $this->getCurrentExchange($userNeedCoin);
        $sallerProfitMargin = $this->tariffGateway->getSallerProfitMargin($sallerId);
        $price = $this->getRoomPrice(
            $roomPrice,
            $profitMargin,
            $currentExchangeBase,
            $currentExchangeConversion,
            $sallerProfitMargin
        );

        $this->presenter->setData($price);
    }

    private function getRoomPrice(
        float $roomPrice,
        float $profitMargin,
        float $currentExchangeBase,
        float $currentExchangeConversion,
        float $sallerProfitMargin,
    ): float
    {
        $currentExchange = $this->getValueConvertedCurrency($currentExchangeBase, $currentExchangeConversion);
        $roomPrice += $roomPrice / 100 * $sallerProfitMargin;

        if ($profitMargin === 0) {
            return $roomPrice * $currentExchange;
        }

        $roomPrice += $roomPrice / 100 * $profitMargin;
        return $this->formatValue($roomPrice * $currentExchange);
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
        return $this->formatValue($value);
    }

    private function formatValue(float $value): float
    {
        return $this->formatter->formatter($value);
    }
}