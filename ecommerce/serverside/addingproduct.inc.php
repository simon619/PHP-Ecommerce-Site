<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $productname = $_POST['productname'];

        try {

            require_once 'db.inc.php';
            require_once 'addingproductcontroller.inc.php';
            require_once 'addingproductmodel.inc.php';

            $error = array();

            if (isEmpty($productname)) {
                $error['product_name_missing'];
            }

            require_once 'configsession.inc.php';

            if ($error) {

                $_SESSION["errors_adding_product"] = $error;
                header('Location: ../vendorhomepage.php');
                die();

            }

            else {
                $currentvendorid = $_SESSION['user_id'];
                createProduct($pdo, $productname, $currentvendorid);
                header('Location: ../vendorhomepage.php?added=successful');
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
        header('Location: ../vendorhomepage.php');
        die();
    }

?>