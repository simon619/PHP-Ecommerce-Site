<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $userpassword = $_POST['password'];

        try {
            require_once 'db.inc.php';
            require_once 'loginview.inc.php';
            require_once 'loginmodel.inc.php';
            require_once 'logincontroller.inc.php';

            $error = array();

            if (isEmpty($username, $userpassword)) {
                $error['input_missing'] = "Insert Data incorrectly"; 
            }

            
            $result = getUserData($pdo, $username);

            if (userValidation($result)) {
                $error['login_error'] = "Incorrect Login Information";
            }

            if (!userValidation($result) && informationValidation($userpassword, $result['password'])) {
                $error['login_error'] = "Incorrect Login Information";
            }

            require_once 'configsession.inc.php';

            if ($error) {

                $_SESSION["errors_login"] = $error;
                header('Location: ../homepage.php');
                die();

            }

            else {

                if ($result['user_type'] == "user" ) {
                    
                    $_SESSION['user_type'] = $result['user_type'];
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['user_name'] = htmlspecialchars($result['user_name']);
                    header('Location: ../userhomepage.php?login=successful');
                }

                else if ($result['user_type'] == "admin" ) {
                    $_SESSION['user_type'] = $result['user_type'];
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['user_name'] = htmlspecialchars($result['user_name']);
                    header('Location: ../adminhomepage.php?login=successful');
                }

                else {
                    $_SESSION['user_type'] = $result['user_type'];
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['user_name'] = htmlspecialchars($result['user_name']);
                    header('Location: ../vendorhomepage.php?login=successful');
                }

                $_SESSION['last_regeneration'] = time();
                $pdo = null;
                $stmt = null;
                die();

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