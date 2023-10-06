<?php

    declare(strict_types=1);

    function checkProductStatus() {

        if (isset($_SESSION['errors_adding_product'])) {
            $errors = $_SESSION['errors_adding_product'];
            
            echo "<h3>Error: </br></h3>";
            foreach ($errors as $key => $value) {
                echo '<p class="form-error">'.$errors[$key].'</br></p>';   
            }
            unset($_SESSION['errors_adding_product']);
        }

        else if (isset($_GET['added']) && $_GET['added'] == "successful") {
            echo '<p class="form-success">Product Has Been Added</br></p>';
        }
    }

    function checkPurchase() {

        if (isset($_SESSION['purchased'])) {
            $product = (String) $_SESSION['purchased'];
            echo "<h2></br>Your Have Purchased ".$product."</br></h2>";
            unset($_SESSION['purchased']);
        }

        else {
            echo "</br>What's On Your Mind !</br>";
        }

    }

?>