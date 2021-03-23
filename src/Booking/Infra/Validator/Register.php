<?php

namespace SRC\Booking\Infra\Validator;

use Config\DataValidator\Validator;

class Register extends Validator
{
    protected function getRules(): array
    {
        return [
            'coinBase' => ['required'],
            'userCoinNeed' => ['required'],
            'hotelId' => ['required'],
            'sellerId' => ['required'],
            'roomId' => ['required']
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!"
        ];
    }
}