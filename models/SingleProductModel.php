<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class SingleProductModel extends BaseModel 
{
  

    function __construct()
    {
        
    }

    function getDescription($_GET['productID'])
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM Product WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":companyID", $companyID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->singleProductTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function singleProductTemplate($row)
    {
        return $template = "

        <section class=product-info-section>
                <div class=text-center>
                    <img class=img-350 margin-30 src = ".$row -> imgUrl." alt= ".$row -> altTxt.">
                    <h1 class=h1-black margin-50>" .$row -> productName ."</h1>
                </div>
                <div class=d-flex justify-content-center justify-content-between>
                        
                    <!-- Navigation tabs - Left side-->
                    <div class=col-7>
                    <ul class=nav id=myTab role=tablist>
                        <li class=margin-15 gap-15 role=presentation>
                          <a class=active text-decoration-none h2-small tabs-a href=#description id=descr-tab data-toggle=tab data-target=#description aria-controls=description aria-selected=true>Description</a>
                        </li>
                        <li class= role=presentation>
                          <a class=text-decoration-none h2-small tabs-a  href=#specification id=specification-tab  data-toggle=tab data-target=#specification aria-controls=specification aria-selected=false>Specification</a>
                        </li>
                      </ul>
                      <div class=tab-content  id=myTabContent>
                        <div class=tab-pane fade show active id=description role=tabpanel aria-labelledby=descr-tab>
                            <p>".$row -> productDescription ."</p>
                        </div>
                        <div class=tab-pane fade id=specification role=tabpanel aria-labelledby=specification-tab>
                            <table>
                                <tr>
                                    <td class=table-i-width>Brand:</td>
                                    <td> ".$row -> brand ."</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class=table-i-width>Size:</td>
                                    <td>".$row -> size." </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class=table-i-width>Color:</td>
                                    <td> ".$row -> color."</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class=table-i-width>Material:</td>
                                    <td> ".$row -> material ."</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class=table-i-width>Condition:</td>
                                    <td>".$row -> condition ." </td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    </div>

                <!-- Right side -->
                    <div class=col-4>
                        <div class=row margin-15>
                            <h2>".$row -> price."</h2>
                        </div>
                        <div class=row margin-15>
                            <button class=c-variations></button>
                            <button class=c-variations></button>
                            <button class=c-variations></button>
                        </div>
                        <div class=row margin-30>
                            <button class=minus>-</button>
                                <input class=amount text-center rounded-0 id=amount type=text value=1 input[type=number]>
                            <button class=plus>+</button>
                        </div>
                        <div class=row><a class=small-button-pink>Add to cart</a></div>
                    </div>
                </div>
            </div>
        </section> ";
    }

}
