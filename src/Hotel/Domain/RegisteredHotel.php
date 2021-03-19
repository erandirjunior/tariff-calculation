<?php

namespace SRC\Hotel\Domain;

use SRC\Hotel\Domain\Register\Hotel;

class RegisteredHotel extends Hotel
{
    public function __construct(
        private string $name,
        private int $id
    )
    {
        parent::__construct($this->name);
    }

    public function getId(): int
    {
        return $this->id;
    }
}