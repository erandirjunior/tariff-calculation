<?php

namespace Config\DataValidator;

use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

abstract class Validator
{
    public function validate(array $data)
    {
        $translator = new Translator(new ArrayLoader(), 'en_US');
        $validatorFactory = new Factory($translator);
        $rules = $this->getRules();
        $msg = $this->getMessages();
        $validator = $validatorFactory->make($data, $rules, $msg);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }
    }

    abstract protected function getRules(): array;

    abstract protected function getMessages(): array;
}