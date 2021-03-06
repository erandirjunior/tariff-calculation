<?php

namespace SRC\Room\Infra\Validator;

use Config\DataValidator\Validator;

class Update extends Validator
{
    protected function getRules(): array
    {
        return [
            'room' => ['required', 'min:3', 'max:20']
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!",
            'min' => "Field :attribute must have 3 characters!",
            'max' => "Field :attribute must have 20 characters!"
        ];
    }
}