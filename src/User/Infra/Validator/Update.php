<?php

namespace SRC\User\Infra\Validator;

use Config\DataValidator\Validator;

class Update extends Validator
{
    protected function getRules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email']
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!",
            'email' => "Field :attribute must have a valid email!",
        ];
    }
}