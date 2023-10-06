<?php

    declare(strict_types=1);

    function getProductInformation(Object $pdo, String $productionid) {
        return getProductInformationFromDB($pdo, $productionid);
    }

    function deleteTheProduct(object $pdo, String $productid, String $vendorid) {
        deleteTheProductFromDB($pdo, $productid, $vendorid);
    }

    function getProductVendorDetails(object $pdo) {
        return getProductVendorDetailsFormDB($pdo);
    }


    function getVendorDetails(object $pdo, String $vendorid) {
        return getVendorDetailsFromBD($pdo, $vendorid);
    }

    function getAllPurchasedProducts(object $pdo, String $userid) {
        return getAllPurchasedProductsFromDB($pdo, $userid);
    }

    function getAllPurchasedProductsForAdmin(object $pdo) {
        return getAllPurchasedProductsFromAdminFromDB($pdo);
    }
?>
