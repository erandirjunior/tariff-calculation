<?php

namespace SRC\User\Domain\Register;

class User
{
    public function __construct(
        private string $name,
        private string $email
    )
    {
        $pattern = '/^[\w\._+]+@[a-z]+\.[a-z]{2,}(?:[.a-z]+)?$/';
        preg_match($pattern, $this->email, $matches);

        if (!$matches) {
            throw new \InvalidArgumentException('The property must be a valid e-mail!');
        }

        $this->email = $matches[0];

        if (strlen($this->name) === 0) {
            throw new \InvalidArgumentException('Name cannot be empty');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
}