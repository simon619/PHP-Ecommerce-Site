<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $userpassword = $_POST['password'];
        $email = $_POST['email'];

        try {
            require_once 'db.inc.php';
            require_once 'signupmodel.inc.php';
            require_once 'signupcontroller.inc.php';

            $error = array();

            if (isEmpty($username, $userpassword, $email)) {
                $error['input_missing'] = "Insert Data Correctly"; 
            }

            if (emailValidation($email)) {  
                $error['valid_email'] = "Email Format is incorrect";
            }

            if (usernameDuplicateCheck($pdo, $username)) {
                $error['username_duplicate'] = "Username Exists";
            }

            if (emailDuplicateCheck($pdo, $email)) {
                $error['email_duplicate'] = "Email Exists";     
            }

            require_once 'configsession.inc.php';

            if ($error) {

                $_SESSION["errors_signup"] = $error;
                header('Location: ../homepage.php');
                die();

            }


            else {
                createUser($pdo, $username, $userpassword, $email);
                header('Location: ../homepage.php?signup=successful');
                die();
                $pdo = null;
                $stmt = null;
            }

        }
        catch (PDOException $e) {
            die("Query Faild: ". $e->getMessage()."</br>");
        }
    }

    else {
        header('Location: ../homepage.php');
        die();
    }

?>