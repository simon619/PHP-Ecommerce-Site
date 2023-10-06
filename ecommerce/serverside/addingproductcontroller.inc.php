<?php

    declare(strict_types=1);

    require_once 'productdetailcontroller.inc.php';

    function isEmpty(String $productname) {
        return empty($productname) ? true : false;
    }

    function createProduct(Object $pdo, String $productname, String $currentvendorid)  {
        setProduct($pdo, $productname, $currentvendorid);
    }

    function getProducts(Object $pdo) {
        $vendorid = (String) $_SESSION['user_id'];
        return fetchAllProductData($pdo, $vendorid);    
    }

    function purchaseProduct(Object $pdo, String $productid, String $userid, String $vendorid) {
        $productdetails = getProductInformation($pdo, $productid);
        $productname = $productdetails['product_name'];
        $productadded = $productdetails['added'];
        addPurchasedProductOnDB($pdo, $userid, $vendorid, $productname, $productadded);
        return $productname;
    }

?>