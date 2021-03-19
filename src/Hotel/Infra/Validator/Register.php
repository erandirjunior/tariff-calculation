<?php

namespace SRC\Hotel\Infra\Validator;

use Config\DataValidator\Validator;

class Register extends Validator
{
    protected function getRules(): array
    {
        return [
            'name' => ['required', 'min:1']
        ];
    }

    protected function getMessages(): array
    {
        return [
            'required' => "Field :attribute can't be empty!",
            'min' => "Field :attribute must have at least 1 characters!"
        ];
    }
}