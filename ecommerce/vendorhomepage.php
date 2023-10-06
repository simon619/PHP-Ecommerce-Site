<?php

    require_once 'serverside/addingproductview.inc.php';
    require_once 'serverside/addingproductcontroller.inc.php';
    require_once 'serverside/addingproductmodel.inc.php';
    require_once 'serverside/loginview.inc.php';
    require_once 'serverside/configsession.inc.php';
    require_once 'serverside/db.inc.php';

?>

<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
    </head>
    <body>

        <?php

            loginCheck()
        
        ?>

        <form action = "serverside\logout.inc.php" method="post">   
            <button type="submit">Logout</button>
        </form>

        <h4>Add a product</h4>
        <form action="serverside\addingproduct.inc.php" method="post">
            <label for="adding">Product Name:</label>
            <input required id="adding" type="text" name="productname" placeholder="Enter Product Name">
            </br>
            <button type="submit">ADD</button>
            </br>
        </form>

        <?php
        
            checkProductStatus();

        ?>

        <table>

            

            <?php
                echo '<table align = "left" border = "1" cellpadding = "3" cellspacing = "0">';
                echo '<tr>
                        <th>Product Name</th>
                        <th>Detail</th>
                    </tr>';

                $result = getProducts($pdo);
                
                foreach ($result as $key => $value) {
                   $productid = $value['id'];
                   echo '<tr>
                            <td>'.htmlspecialchars($value["product_name"]).'</td>
                            <td>
                            <a href="serverside/productdetails.inc.php?product_id='.$productid.'">
                                <button>More</button>
                            </a>
                                
                            </td>
                        </tr>';
                }
                echo '</table>';
                
            
            ?>
        </table>
    </body>
</html>



       



       