<?php

namespace App;
use const ROOT;
use PDO;

class Database
{
    private static $instance = null;
    private $pdo;

    protected function __construct()
    {
        global $dbName, $user, $pass;

        // MySQL
        //$dsn = "mysql:dbname=".DB_NAME.";host=".HOST.";port=3306;charset=utf8";
        // $this->pdo = new PDO($dsn, USER, PASS);

        // SQLite
        $dsn = "sqlite:" . ROOT . '/database/db.sqlite';
        $this->pdo = new PDO($dsn);

        // Dina standardinställningar
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        //aktivera främmande nycklar för SQLite. Behövs inte om man använder MySQL eller andra DB.
        $this->pdo->exec('PRAGMA foreign_keys = ON');
    }

    /**
     * Ge oss koppling mot DB. Skapar sig själv om den inte finns.
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (!self::$instance) {
            self:
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Ge oss en PDO-objektet som vi jobbar med
     * @return mixed
     */
    public function getPDO()
    {
        return $this->pdo;
    }
}