<?php

namespace SRC\Coin\Infra\Validator;

use Config\DataValidator\Validator;

class Register extends Validator
{
    protected function getRules(): array
    {
        return [
            'money' => ['required', 'min:3', 'max:3'],
            'profitMargin' => ['required', 'numeric']
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!",
            'money.min' => "Field :attribute must have 3 characters!",
            'money.max' => "Field :attribute must have 3 characters!",
            'profitMargin.numeric' => "Field :attribute must be a numeric value!"
        ];
    }
}