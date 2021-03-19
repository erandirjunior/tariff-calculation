<?php

namespace SRC\Hotel\Domain\Register;

class Hotel
{
    public function __construct(
        private string $name
    )
    {
        if (strlen($this->name) <= 0) {
            $msg = 'Field name must have at least 1 character!';
            throw new \InvalidArgumentException($msg);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
}