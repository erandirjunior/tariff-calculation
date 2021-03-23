<?php

namespace SRC\Booking\Adapters\Presenters;

interface FindAllVM
{
    public function setData($content): void;

    public function getData(): array;
}