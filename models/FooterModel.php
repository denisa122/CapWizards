<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class FooterModel extends BaseModel
{


    function __construct()
    {
    }

    function getFooterInfo()
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT openingHours, email, phoneNumber 
            FROM Company 
            WHERE companyID = 1";
            $stmt = $cxn->prepare($query);

            $stmt->execute();
            
            $result =  $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->footerInfoTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function footerInfoTemplate($row)
    {
        return $template = "

        <article class='margin-50'>
            <tr> " . $row->openingHours . "</tr>
        </article> 
         <article>
            <h2 class='h2-small margin-30'>Do (not) hesitate to contact our team of Mystic Scaly Spellwavers with any questions and other matters :D</h2>
            <table>
                <tr>
                    <td class='table-i-width'>Email:</td>
                    <td> " . $row->email . " </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td class='table-i-width'>Phone number:</td>
                    <td>" . $row->phoneNumber . "</td>
                </tr>
            </table>
        </article> ";
    }
}
