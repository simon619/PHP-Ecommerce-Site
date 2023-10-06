<?php

    declare(strict_types=1);

    function getProductInformationFromDB(object $pdo, String $productid) {

        $query = "SELECT * FROM products WHERE id = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$productid]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    function deleteTheProductFromDB(Object $pdo, String $productid, String $vendorid) {
        $query1 = "DELETE FROM vendorproduct WHERE product_id = ? AND vendor_id = ?;";
        $stmt1 = $pdo->prepare($query1);
        $stmt1->execute([$productid, $vendorid]);
        
        
        $query2 = "DELETE FROM products WHERE id = ?";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([$productid]);
    }

    function getProductVendorDetailsFormDB(Object $pdo) {
        $query = "SELECT p.product_name, p.id, p.added, vp.vendor_id FROM products p JOIN vendorproduct vp ON p.id = vp.product_id JOIN users u ON  u.id = vp.vendor_id ORDER BY vp.vendor_id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getVendorDetailsFromBD(Object $pdo, String $vendorid) {
        $query = "SELECT * FROM users WHERE id = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$vendorid]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    function getAllPurchasedProductsFromDB(Object $pdo, String $userid) {
        $query = "SELECT vn.user_name, vn.email, up.product_name, up.product_added, up.purchased FROM users us JOIN userproduct up ON us.id = up.user_id JOIN users vn ON up.vendor_id = vn.id WHERE us.id = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userid]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllPurchasedProductsFromAdminFromDB(Object $pdo) {
        $query = "SELECT us.user_name, vn.user_name AS vendor_name, vn.email, up.product_name, up.product_added, up.purchased FROM users us JOIN userproduct up ON us.id = up.user_id JOIN users vn ON up.vendor_id = vn.id ORDER BY us.id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>