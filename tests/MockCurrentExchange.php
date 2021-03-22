<?php


namespace Tests;


use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeUnit;

class MockCurrentExchange implements GetCurrentExchangeUnit
{
    public function getValue(string $coin): float
    {
        switch ($coin) {
            case 'USD':
                return 5.43;
            case 'EUR':
                return 6.54;
            case 'BRL':
                return 1;
        }
    }
}