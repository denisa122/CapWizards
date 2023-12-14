<?php

namespace DataAccess\DB;

use Exception;

require("constants.php");

class DBConnector
{
    function connectToDB()
    {
        // Set DSN -Database source Name 
        $dsn = 'mysql:host=' . DB_SERVER . '; dbname=' . DB_NAME;

        try {
            // Create a PDO instance
            $pdo = new \PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $pdo;
    }
}
