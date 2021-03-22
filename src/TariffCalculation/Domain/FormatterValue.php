<?php

namespace SRC\TariffCalculation\Domain;

class FormatterValue
{
    public function formatter($value): float
    {
        $valueToArray = explode('.', $value);

        if (!empty($valueToArray[1])) {
            $decimals = substr((string) $valueToArray[1], 0, 2);
            $value = "{$valueToArray[0]}.{$decimals}";
        }

        return floatval($value);
    }
}