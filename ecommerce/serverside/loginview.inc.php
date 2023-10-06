<?php

    function loginCheck() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "user") {
            echo "<h3> Welcome User ".$_SESSION['user_name']."</br></h3>";
        }

        else if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "admin") {
            echo "<h3> Welcome Admin ".$_SESSION['user_name']."</br></h3>";
        }

        else if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "vendor") {
            echo "<h3> Welcome Vendor ".$_SESSION['user_name']."</br></h3>";
        }

        else {
            echo "<h3>Please Log in</br></h3>";
        }
    }

    function  checkLoginErrors() {
        if (isset($_SESSION['errors_login'])) {
            $error = $_SESSION['errors_login'];

            echo '<h2>Error: </br></h2>';
            foreach ($error as $key => $value) {
                echo "<p>".$error[$key]."</br></p>";
            }
        }

        else if (isset($_GET['login']) && $_GET['login'] == "successful") {
            echo "Log in Successful";
        }
    }

?>