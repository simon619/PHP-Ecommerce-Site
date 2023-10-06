<?php

    declare(strict_types=1);

    function checkSignUpErrors() {
        if (isset($_SESSION['errors_signup'])) {
            $errors = $_SESSION["errors_signup"];

            echo "<h3> Error: </h3>";
            foreach ($errors as $key => $value) {
                echo '<p class="form-error">'.$errors[$key].'</br></p>';
            }

            unset($_SESSION['errors_signup']);
        }
        else if (isset($_GET['signup']) && $_GET['signup'] == "successful") {
            echo '<p class="form-success">Created Account</br></p>';
        }
    }

?>