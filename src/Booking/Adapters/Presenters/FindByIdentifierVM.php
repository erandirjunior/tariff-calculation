<?php

namespace SRC\Booking\Adapters\Presenters;

interface FindByIdentifierVM
{
    public function setData(array $content): void;

    public function getData(): array;
}