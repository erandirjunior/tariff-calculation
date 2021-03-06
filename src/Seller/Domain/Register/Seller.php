<?php

namespace SRC\Seller\Domain\Register;

class Seller
{
    public function __construct(
        private string $name,
        private float $profitMargin
    )
    {
        if ($this->profitMargin < 0) {
            $msg = 'Field profit margin should be equal or bigger than 0!';
            throw new \InvalidArgumentException($msg);
        }

        if (strlen($this->name) === 0) {
            $msg = 'Field name is invalid!';
            throw new \InvalidArgumentException($msg);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getProfitMargin(): float
    {
        return $this->profitMargin;
    }
}