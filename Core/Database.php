<?php

namespace Core;

use PDO;
use PDOException;


/**
 * Database Singleton Class
 */
class Database
{
    private static $instance = null;
    private $pdo;
    private $statement;

    /**
     * The constructor is private to prevent initiation with outer code.
     */
    private function __construct()
    {
        $this->connect();
    }

    /**
     * The object is created from within the class itself only if the class has no instance.
     *
     * @return Database
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Connect to the database and set the error mode to Exception.
     */
    private function connect()
    {
        try {
            $dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'];
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Prepare a statement with the given SQL.
     *
     * @param string $sql
     * @return self
     */
    public function query($sql)
    {
        $this->statement = $this->pdo->prepare($sql);
        return $this;
    }

    /**
     * Bind a value to a named or question mark placeholder in the SQL statement.
     *
     * @param string $param
     * @param mixed $value
     * @param mixed $type
     * @return self
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($param, $value, $type);
        return $this;
    }

    /**
     * Execute the prepared statement.
     *
     * @return bool
     */
    public function execute()
    {
        try {
            return $this->statement->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Fetch all records from the executed statement.
     *
     * @return array
     */
    public function fetchAllRecords()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Fetch a single record from the executed statement.
     *
     * @return object
     */
    public function fetchSingleRecord()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get the number of affected rows by the last SQL statement.
     *
     * @return int
     */
    public function getRowCount()
    {
        return $this->statement->rowCount();
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    /**
     * Prevent instance from being serialized.
     */
    protected function __sleep() { }

    /**
     * Prevent instance from being cloned.
     */
    private function __clone() { }

    /**
     * Prevent instance from being unserialized.
     */
    private function __wakeup() { }

}
