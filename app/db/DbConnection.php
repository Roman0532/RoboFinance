<?php

namespace app\db;

use PDO;

class DbConnection
{
    /**
     * @return PDO
     */
    public function connection()
    {
        $config = require_once '../env.php';
        $dsn = "mysql:host={$config['host']};dbname={$config['db_name']};charset={$config['charset']}";
        try {
            return new PDO($dsn, $config['username'], $config['password']);
        } catch (\PDOException $exception) {
            exit($exception->getMessage());
        }
    }
}
