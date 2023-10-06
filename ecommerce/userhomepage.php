


<?php

    require_once 'serverside/loginview.inc.php';
    require_once 'serverside/productdetailcontroller.inc.php';
    require_once 'serverside/productdetailview.inc.php';
    require_once 'serverside/productdetailmodel.inc.php';
    require_once 'serverside/addingproductview.inc.php';
    require_once 'serverside/configsession.inc.php';
    require_once 'serverside/db.inc.php';

    loginCheck()

?>

<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
    </head>
    <body>


        <form action = "serverside\logout.inc.php" method="post">
            <button type="submit">Logout</button>
        </form>

        <p></br></p>
        <h3>Purchased History:</br></h3>
        <a href="purchasedhistory.php">
            <button>Get Detials</br></button>
        </a>

        <?php
            echo '</br>';
            checkPurchase();
        
            $allproductVendorDetails = getProductVendorDetails($pdo); 
            showAllVendorProductsDetails($pdo, $allproductVendorDetails);
            $pdo = null;
        
        ?>

        
    </body>
</html>