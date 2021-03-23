<?php

namespace SRC\RoomCoin\Infra\Validator;

use Config\DataValidator\Validator;

class Update extends Validator
{
    protected function getRules(): array
    {
        return [
            'price' => ['required', 'numeric']
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