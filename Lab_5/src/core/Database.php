<?php

namespace App\core;

use PDO;
use PDOException;

class Database
{
    private static $host = 'localhost';

    private static $dbName = 'file_manager';

    private static $username = 'root';

    private static $password = '';



    public function PDO()
    {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName, self::$username, self::$password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql)
    {
        try {
            $statement = $this->PDO()->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $ex) {
            $mess = $ex->getMessage();
            echo $mess;
        }
    }

}