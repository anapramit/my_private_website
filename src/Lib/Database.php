<?php

namespace App\Lib;

use \PDO;
use \PDOException;

class Database {
    public static function getPDO() {
        $config = [ 
            'host' => 'localhost',
            'user'  => 'postgres',
            'password' => 'postgres',
            'database'  => 'lololink'
        ];

        try {
            $db = new PDO("pgsql:host={$config['host']};port='5432';dbname={$config['database']}", $config['user'], $config['password'], [
            PDO::ATTR_EMULATE_PREPARES => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch(PDOException $error) {
            exit('Database error');
        }

        return $db;
    }
}