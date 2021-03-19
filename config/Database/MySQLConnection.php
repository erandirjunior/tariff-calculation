<?php

namespace Config\Database;

class MySQLConnection implements Connection
{
    public function getConnection(): \PDO
    {
        return new \PDO('mysql:host=mysql;dbname=tariff_calculation', 'root', 'root');
    }
}