<?php

    declare(strict_types=1);

    function userValidation(bool | array $result) {

        return (!$result) ? true : false;

    }

    function isEmpty(String $username, String $password) {
        return (empty($username) || empty($password)) ? true : false;
    }

    function informationValidation(String $insertedPassword, String $actualPassword) {
        return ($insertedPassword != $actualPassword) ? true : false;
    }

?>