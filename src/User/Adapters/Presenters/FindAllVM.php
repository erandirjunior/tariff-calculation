<?php

namespace SRC\User\Adapters\Presenters;

interface FindAllVM
{
    public function setData(string $name, string $email, int $id): void;

    public function getData(): array;
}