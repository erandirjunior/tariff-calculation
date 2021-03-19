<?php

namespace SRC\Coin\Domain\Find;

interface FinderAllPresenter
{
    public function setData(CoinContainer $coinContainer): void;
}