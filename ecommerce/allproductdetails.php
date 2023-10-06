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

            
            echo '<a href="adminhomepage.php">
                    <button>Back To Admin Homepage</button>
                 </a>';
            
    
        
            $allproductVendorDetails = getProductVendorDetails($pdo); 
            showAllVendorProductsDetails($pdo, $allproductVendorDetails);
            $pdo = null;
        ?>

    </body>
</html>