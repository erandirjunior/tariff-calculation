<?php

namespace SRC\Currency\Infra\Validator;

use Config\DataValidator\Validator;

class Register extends Validator
{
    protected function getRules(): array
    {
        return [
            'currency' => ['required', 'min:3', 'max:3'],
            'profitMargin' => ['required', 'numeric']
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!",
            'currency.min' => "Field :attribute must have 3 characters!",
            'currency.max' => "Field :attribute must have 3 characters!",
            'profitMargin.numeric' => "Field :attribute must be a numeric value!"
        ];
    }
}