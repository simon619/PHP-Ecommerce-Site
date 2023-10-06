<?php

    require_once 'serverside/productdetailcontroller.inc.php';
    require_once 'serverside/productdetailview.inc.php';
    require_once 'serverside/productdetailmodel.inc.php';
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

            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "user") {
                $userid = (String) $_SESSION['user_id'];
                $allpurchasedproductsHistory = getAllPurchasedProducts($pdo, $userid);
                showAllpurchasedproductsHistory($allpurchasedproductsHistory);
                $pdo = null;
            }

            else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin") {
                $userid = (String) $_SESSION['user_id'];
                $allpurchasedproductsHistory = getAllPurchasedProductsForAdmin($pdo);
                showAllpurchasedproductsHistoryForAdmin($allpurchasedproductsHistory);
                $pdo = null;
            }

        ?>
    </body>
</html>