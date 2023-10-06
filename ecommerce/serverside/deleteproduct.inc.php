<?php

    require_once 'productdetailmodel.inc.php';
    require_once 'productdetailcontroller.inc.php';
    require_once 'configsession.inc.php';
    require_once 'db.inc.php';

    if (!isset($_SESSION['vendor_id'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productid = (String) $_SESSION['product_id'];
            $vendorid = (String) $_SESSION['user_id'];
            deleteTheProduct($pdo, $productid, $vendorid);
            unset($_SESSION['product_id']);

            header('Location: ../vendorhomepage.php');
            $pdo = null;
            die();
        }

        else {
            header('Location: ../vendorhomepage.php');
            die();
        }
    }

    else if (isset($_SESSION['vendor_id'])) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productid = (String) $_SESSION['product_id'];
            $vendorid = (String) $_SESSION['vendor_id'];
            deleteTheProduct($pdo, $productid, $vendorid);
            unset($_SESSION['product_id']);
            unset($_SESSION['vendor_id']);

            header('Location: ../allproductdetails.php');
            $pdo = null;
            die();
        }

        else {
            header('Location: ../allproductdetails.php');
            die();
        }
    }
    
    else {
        header('Location: ../homepage.php');
        die();
    }
      

?>