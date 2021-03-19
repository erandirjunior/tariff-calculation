<?php

namespace SRC\Hotel\Adapters\Presenters;

interface FindAllVM
{
    public function setData(string $name, int $id): void;

    public function getData(): array;
}