<?php

namespace DataAccess\DB;

use Exception;

require ("constants.php");

class DBConnector
{
    function connectToDB()
    {
        //Set DSN -Database source Name 
        $dsn = 'mysql:host=' .DB_SERVER .'; dbname=' .DB_NAME;

        try {
            //create a PDO instance
            $pdo = new \PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

        } catch(\PDOException $e) {
            echo "Connection failed: " .$e->getMessage();
        }

        return $pdo;
    }   
}

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    if(!$conn){
        die("Gg wp,you broke it");
    }

    $dbSelect = mysqli_select_db($conn, DB_NAME);

    if(!$dbSelect){
        die("Some people just shouldn't code, maybe try poetry?".mysqli_error($conn));
    }

?>