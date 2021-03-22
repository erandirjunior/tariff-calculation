<?php

namespace SRC\Seller\Infra\Validator;

use Config\DataValidator\Validator;

class Register extends Validator
{
    protected function getRules(): array
    {
        return [
            'name' => ['required'],
            'profitMargin' => ['required', 'numeric']
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!",
            'profitMargin.numeric' => "Field :attribute must be a numeric value!"
        ];
    }
}