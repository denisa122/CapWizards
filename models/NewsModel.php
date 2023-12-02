<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class NewsModel extends BaseModel 
{
  

    function __construct()
    {
        
    }

    function getNews($newsID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM News WHERE newsID = :newsID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":newsID", $newsID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->newsTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function newsTemplate($row)
    {
        return $template = "

        <h2 class = h2-pink margin-15>".$row -> newsTitle ."</h2>
        <p class ='p-pink'> ".$row -> newsText ."</p> ";
    }

}

