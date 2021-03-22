<?php

namespace SRC\Seller\Domain;

use SRC\Seller\Domain\Register\Seller;

class RegisteredSeller extends Seller
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