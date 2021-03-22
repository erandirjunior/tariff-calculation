<?php

namespace SRC\TariffCalculation\Infra\Validator;

use Config\DataValidator\Validator;

class TariffByRoom extends Validator
{
    protected function getRules(): array
    {
        return [
            'roomId' => ['required', 'numeric'],
            'hotelId' => ['required', 'numeric'],
            'toCoin' => ['required', 'numeric'],
            'fromCoin' => ['required', 'numeric'],
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!",
            'numeric' => "Field :attribute must have a numeric value!",
        ];
    }
}