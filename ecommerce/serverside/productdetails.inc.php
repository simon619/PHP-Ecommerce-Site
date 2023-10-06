<?php

    require_once 'productdetailcontroller.inc.php';
    require_once 'productdetailview.inc.php';
    require_once 'productdetailmodel.inc.php';
    require_once 'configsession.inc.php';
    require_once 'db.inc.php';

?>

<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
    </head>
    <body>

        <?php
            // For Vendor
            if (isset($_GET['product_id']) && !isset($_GET['vendor_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == "vendor") {
                $_SESSION['product_id'] = $_GET['product_id'];
                $productid = (String) $_GET['product_id'];
                $productinformation = getProductInformation($pdo, $productid);

                showProductDetails($productinformation);
                // unset($_SESSION['product_id']);
            }

            // For Admin
            else if (isset($_GET['product_id']) && isset($_GET['vendor_id']) && isset($_SESSION['user_type']) && ($_SESSION['user_type'] == "admin" || $_SESSION['user_type'] == "user")) {
                $_SESSION['product_id'] = $_GET['product_id'];
                $productid = (String) $_GET['product_id'];
                $_SESSION['vendor_id'] = (String) $_GET['vendor_id'];
                $productinformation = getProductInformation($pdo, $productid);

                showProductDetails($productinformation);
                // unset($_SESSION['product_id']);
                // unset($_SESSION['vendor_id']);
            }

            if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == "admin" || $_SESSION['user_type'] == "vendor")) {
                echo '<form action = "deleteproduct.inc.php" method="post">   
                        <button type="submit">Delete Product</button>
                      </form>';
            }

            else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "user") {
                echo '<form action = "purchaseproduct.inc.php" method="post">   
                        <button type="submit">Purchase Product</button>
                      </form>';    
            }
        
        ?>
    </body>
</html>

    