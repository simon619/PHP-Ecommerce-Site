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

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $allproductVendorDetails = getProductVendorDetails($pdo); 
                showAllVendorProductsDetails($pdo, $allproductVendorDetails);
                $pdo = null;
            }
            else {
                header('Location: ../adminhomepage.php');
                die();
            }

        ?>
    </body>
</html>