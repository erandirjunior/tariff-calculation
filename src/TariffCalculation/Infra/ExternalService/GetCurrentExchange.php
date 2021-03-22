<?php

namespace SRC\TariffCalculation\Infra\ExternalService;

use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeUnit;

class GetCurrentExchange implements GetCurrentExchangeUnit
{
    public function getValue(string $coin): float
    {
        $content = file_get_contents("https://economia.awesomeapi.com.br/all/{$coin}");
        $content = json_decode($content, true);

        if(empty($content[$coin]['bid'])) {
            return 1;
        }

        return $content[$coin]['bid'];
    }
}