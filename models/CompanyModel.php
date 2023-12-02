<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class DescriptionModel extends BaseModel 
{
  

    function __construct()
    {
        
    }

    function getDescription($companyID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM Company WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":companyID", $companyID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->descrTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function descrTemplate($row)
    {
        return $template = "

        <p class ='p-pink'> ".$row -> compDescription."</p> ";
    }

}

class OpeningHModel extends BaseModel 
{

    function __construct()
    {
        
    }

    function getOpeningH($companyID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT openingHours FROM Company WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":companyID", $companyID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->openingHTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function openingHTemplate($row)
    {
        return $template = "

        <tr>
        ".$row -> openingHours."
        </tr>";
    }

}



