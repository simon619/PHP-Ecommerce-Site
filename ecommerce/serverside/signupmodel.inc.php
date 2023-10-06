<?php

    declare(strict_types=1);


    function getUsername(Object $pdo, String $username) {

        $query = "SELECT user_name FROM users WHERE user_name = ?;";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function getEmail(Object $pdo, String $email) {

        $query = "SELECT email FROM users WHERE email = ?;";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function setUser(Object $pdo, String $username, String $userpassword, String $email) {
        
        $query = "INSERT INTO users (user_name, password, email) VALUES (?, ?, ?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $userpassword, $email]);
    }

    function setAdminOrVendor(Object $pdo, String $username, String $userpassword, String $email, String $usertype) {
        
        $query = "INSERT INTO users (user_name, password, email, user_type) VALUES (?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $userpassword, $email, $usertype]);
    }
?>