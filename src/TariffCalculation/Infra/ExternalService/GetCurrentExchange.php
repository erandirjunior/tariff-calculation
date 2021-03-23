<?php

namespace SRC\TariffCalculation\Infra\ExternalService;

use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeUnit;

class GetCurrentExchange implements GetCurrentExchangeUnit
{
    public function getValue(string $currency): float
    {
        $content = file_get_contents("https://economia.awesomeapi.com.br/all/{$currency}");
        $content = json_decode($content, true);

        if(empty($content[$currency]['bid'])) {
            return 1;
        }

        return $content[$currency]['bid'];
    }
}