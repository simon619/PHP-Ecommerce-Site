<?php

    declare(strict_types=1);

    function isEmpty(String $username, String $userpassword, String $email) {
        if (empty($username) || empty($userpassword) || empty($email)) {
            return true;
        }

        else {
            return false;
        }
    }

    function emailValidation(String $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        
        else {
            return false;
        }
    }

    function usernameDuplicateCheck(Object $pdo, String $username) {
        if (getUsername($pdo, $username)) {
            return true;
        }

        else {
            return false;
        }
    }

    function emailDuplicateCheck(Object $pdo, String $email) {
        if (getUsername($pdo, $email)) {
            return true;
        }

        else {
            return false;
        }
    }

    function createUser(Object $pdo, String $username, String $userpassword, String $email) {
        setUser($pdo, $username, $userpassword, $email);
    }

    function createAdminOrVendor(Object $pdo, String $username, String $userpassword, String $email, String $usertype) {
        setAdminOrVendor($pdo, $username, $userpassword, $email, $usertype);
    }

?>