<?php

namespace SRC\Saller\Domain;

use SRC\Saller\Domain\Register\Saller;

class RegisteredSaller extends Saller
{
    public function __construct(
        private string $name,
        private float $profitMargin,
        private int $id
    )
    {
        parent::__construct($this->name, $this->profitMargin);
    }

    public function getId(): int
    {
        return $this->id;
    }
}