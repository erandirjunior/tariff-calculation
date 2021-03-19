<?php

namespace Config\Database;

interface Connection
{
    public function getConnection(): \PDO;
}