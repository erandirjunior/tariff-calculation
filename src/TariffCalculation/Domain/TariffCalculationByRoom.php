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

    public function calculate(Tariff $tariff): void
    {
        $roomPrice = $this->tariffGateway
            ->getRoomPriceByCurrency($tariff->getRoomId(), $tariff->getCurrencyBase(), $tariff->getHotelId());
        $profitMargin = $this->tariffGateway->getProfitMargin($tariff->getUserCurrencyNeed());
        $userNeedCurrency = $this->getMoney($tariff->getUserCurrencyNeed());
        $baseCurrency = $this->getMoney($tariff->getCurrencyBase());
        $currentExchangeBase = $this->getCurrentExchange($baseCurrency);
        $currentExchangeConversion = $this->getCurrentExchange($userNeedCurrency);
        $sellerProfitMargin = $this->tariffGateway->getSellerProfitMargin($tariff->getSellerId());
        $price = $this->getRoomPrice(
            $roomPrice,
            $profitMargin,
            $currentExchangeBase,
            $currentExchangeConversion,
            $sellerProfitMargin
        );

        $this->presenter->setData($price);
    }

    private function getRoomPrice(
        float $roomPrice,
        float $profitMargin,
        float $currentExchangeBase,
        float $currentExchangeConversion,
        float $sellerProfitMargin,
    ): float
    {
        $currentExchange = $this->getValueConvertedCurrency($currentExchangeBase, $currentExchangeConversion);
        $roomPrice += $roomPrice / 100 * $sellerProfitMargin;

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

    private function getMoney(int $currencyId): string
    {
        return $this->tariffGateway->getMoney($currencyId);
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