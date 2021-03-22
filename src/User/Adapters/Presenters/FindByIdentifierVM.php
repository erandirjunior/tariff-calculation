<?php

namespace SRC\User\Adapters\Presenters;

interface FindByIdentifierVM
{
    public function setData(string $name, string $email, int $id): void;

    public function getData(): array;
}