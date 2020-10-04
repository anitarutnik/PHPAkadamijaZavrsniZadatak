<?php

declare(strict_types=1);

namespace App\Core;

class Database extends \PDO
{
    private static $instance;

    public function __construct()
    {
        $dbConfig = Config::get('db');

        $dsn = 'mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['name'] . ';charset=utf8';

        // $dsn = 'mysql:dbname=myhome;host=127.0.0.1';
        $user = $dbConfig['user'];
        $password = $dbConfig['password'];

        try {
            // $dbh = new \PDO($dsn, $user, $password);
            parent::__construct($dsn, $user, $password);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }


        $this->setAttribute(
            \PDO::ATTR_DEFAULT_FETCH_MODE,
            \PDO::FETCH_ASSOC
        );
    }

    private function __clone()
    {
    }

    public static function getInstance(): self
    {
        if (static::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }
}
