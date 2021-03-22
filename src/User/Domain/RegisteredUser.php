<?php

namespace SRC\User\Domain;

use SRC\User\Domain\Register\User;

class RegisteredUser extends User
{
    public function __construct(
        private string $name,
        private string $email,
        private int $id
    )
    {
        parent::__construct($this->name, $this->email);
    }

    public function getId(): int
    {
        return $this->id;
    }
}