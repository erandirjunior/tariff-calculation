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
            'toCurrency' => ['required', 'numeric'],
            'fromCurrency' => ['required', 'numeric'],
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