<?php

    declare(strict_types=1);


    function showProductDetails($productinformation) {


        // foreach ($productinformation as $key => $value) {
            echo "<h1>Product Name: ".htmlspecialchars($productinformation['product_name'])."</br><h1>";
            echo "<h3>Added on: ".htmlspecialchars($productinformation['added'])."</br><h3>";
        // }

    }

    function showAllVendorProductsDetails(Object $pdo, array $allproductVendorDetails) {
        echo '</br>';
        echo '<table align = "left" border = "1" cellpadding = "3" cellspacing = "0">';
        echo '<tr>
                <th>Vendor Name</th>
                <th>Vendor Contact</th>
                <th>Vendor Joined</th>
                <th>Product Name</th>
                <th>Created</th>
                <th>Detail</th>
              </tr>';

                foreach ($allproductVendorDetails as $key => $value) {
                    $productid = (String) $value['id'];
                    $vendorid = (String) $value['vendor_id'];
                    $vendordetails = getVendorDetails($pdo, $vendorid);
                    echo '<tr>
                            <td>'.htmlspecialchars($vendordetails['user_name']).'</td>
                            <td>'.htmlspecialchars($vendordetails['email']).'</td>
                            <td>'.htmlspecialchars($vendordetails['created']).'</td>
                            <td>'.htmlspecialchars($value["product_name"]).'</td>
                            <td>'.htmlspecialchars($value["added"]).'</td>
                            <td>
                                <a href="serverside/productdetails.inc.php?product_id='.$productid.'&vendor_id='.$vendorid.'">
                                    <button>More</button>
                                </a>
                            </td>
                        </tr>';
                }
            echo '</table>';
        }

        function showAllpurchasedproductsHistory($history) {
            echo '</br>';
            echo '<table align = "left" border = "1" cellpadding = "3" cellspacing = "0">';
            echo '<tr>
                    <th>Vendor Name</th>
                    <th>Vendor Contact</th>
                    <th>Product Name</th>
                    <th>Product Added</th>
                    <th>Purchased On</th>
                </tr>';

                foreach ($history as $key => $value) {
                    echo '<tr>
                            <td>'.htmlspecialchars($value['user_name']).'</td>
                            <td>'.htmlspecialchars($value['email']).'</td>
                            <td>'.htmlspecialchars($value['product_name']).'</td>
                            <td>'.htmlspecialchars($value["product_added"]).'</td>
                            <td>'.htmlspecialchars($value["purchased"]).'</td>
                        </tr>';    
                }

                echo '</table>';
        }

        function showAllpurchasedproductsHistoryForAdmin($history) {
            echo '</br>';
            echo '<table align = "left" border = "1" cellpadding = "3" cellspacing = "0">';
            echo '<tr>
                    <th>Customer Name</th>
                    <th>Vendor Name</th>
                    <th>Vendor Contact</th>
                    <th>Product Name</th>
                    <th>Product Added</th>
                    <th>Purchased On</th>
                </tr>';

                foreach ($history as $key => $value) {
                    echo '<tr>
                            <td>'.htmlspecialchars($value['user_name']).'</td>
                            <td>'.htmlspecialchars($value['vendor_name']).'</td>
                            <td>'.htmlspecialchars($value['email']).'</td>
                            <td>'.htmlspecialchars($value['product_name']).'</td>
                            <td>'.htmlspecialchars($value["product_added"]).'</td>
                            <td>'.htmlspecialchars($value["purchased"]).'</td>
                        </tr>';    
                }

                echo '</table>';
        }


?>
