<?php

namespace SRC\Currency\Domain\Find;

interface FinderAllPresenter
{
    public function setData(CurrencyContainer $currencyContainer): void;
}