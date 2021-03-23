<?php

namespace SRC\Currency\Infra\ViewModel;

use SRC\Currency\Adapters\Presenters\FindByIdentifierVM;

class FindByIdentifier implements FindByIdentifierVM
{
    public function __construct(private array $data = [])
    {}

    public function setData(string $currency, float $profitMargin, int $id): void
    {
        $this->data = [
            'currency' => $currency,
            'profitMargin' => $profitMargin,
            'id' => $id,
        ];
    }

    public function getData(): array
    {
        return $this->data;
    }
}