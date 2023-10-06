<?php

    $dsn = "mysql:host=localhost;dbname=phpecommerce";
    $dbusername = "root";
    $dbpassword = "pwroot";

    
    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p> Database Connected </P> </br>";
    }

    catch (PDOException $e) {
        die("Connection Faild: ". $e->getMessage()."</br>");
    }

?>

