<?php

    declare(strict_types=1);

    function getUserData(Object $pdo, String $username) {


        $query = "SELECT * FROM users WHERE user_name = ?;";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }
?>