<?php

namespace SRC\Hotel\Adapters\Presenters;

interface RegisterVM
{
    public function setData(array $content);

    public function getData(): array;
}