<?php

    declare(strict_types=1);

    function setProduct(Object $pdo, String $productname, String $currentvendorid)  {
    
        $query1 = "INSERT INTO products (product_name) VALUES (?);";

        $stmt1 = $pdo->prepare($query1);
        $stmt1->execute([$productname]);

        $query2 = "SELECT id FROM products ORDER BY id DESC LIMIT 0, 1;";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute();
        $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        $productid = $result['id'];

        $query3 = "INSERT INTO vendorproduct (vendor_id, product_id) VALUES (?, ?);";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->execute([$currentvendorid, $productid]);
    }

    function fetchAllProductData(Object $pdo, String $vendorid) {
        $query = "SELECT p.product_name, p.id FROM products p JOIN vendorproduct vp ON p.id = vp.product_id JOIN users u ON u.id = vp.vendor_id WHERE u.id = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$vendorid]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function addPurchasedProductOnDB(Object $pdo, String $userid, String $vendorid, String $productname, String $productadded) {
        $query = "INSERT INTO userproduct (user_id, vendor_id, product_name, product_added) VALUES (?, ?, ?, ?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userid, $vendorid, $productname, $productadded]);    
    }

?>