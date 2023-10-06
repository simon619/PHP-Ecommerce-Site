<?php

    require_once 'addingproductcontroller.inc.php';
    require_once 'addingproductmodel.inc.php';
    require_once 'productdetailcontroller.inc.php';
    require_once 'productdetailview.inc.php';
    require_once 'productdetailmodel.inc.php';
    require_once 'configsession.inc.php';
    require_once 'db.inc.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $productid = (String) $_SESSION['product_id'];
        $vendorid = (String) $_SESSION['vendor_id'];
        $userid = (String) $_SESSION['user_id'];

        $_SESSION['purchased'] = purchaseProduct($pdo, $productid, $userid, $vendorid);
        deleteTheProduct($pdo, $productid, $vendorid);
        unset($_SESSION['product_id']);
        unset($_SESSION['vendor_id']);

        header('Location: ../userhomepage.php');
        $pdo = null;
        die();
    }
    else {
        header('Location: ../userhomepage.php');
        $pdo = null;
        die();
    }


?>