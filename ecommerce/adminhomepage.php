<?php

    require_once 'serverside/signupview.inc.php';
    require_once 'serverside/loginview.inc.php';
    require_once 'serverside/configsession.inc.php';

?>

<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
    </head>
    <body>

        <?php

            loginCheck()
        
        ?>

        <h4>Create An Account</h4>
        <form action="serverside\adminvendorsignuppage.inc.php" method="post">
            <label for="username">Username</label>
            <input required id="username" type="text" name="username" placeholder="Enter Username">
            </br>
            <label for="password">Password</label>
            <input required id="password" type="password" name="password" placeholder="Enter Passwod">
            </br>
            <label for="email">Email</label>
            <input required id="email" type="text" name="email" placeholder="Enter Email">
            </br>
            <select id="usertype" name="usertype">
                <option value="vendor">Vendor</option>
                <option value="admin">Admin</option>
            </select>
            <p> </br></p>            
            <button type="submit">Submit</button>
            </br>
        </form>

        <?php
        
            checkSignUpErrors();

        ?>


        <form action = "serverside\logout.inc.php" method="post">
            <button type="submit">Logout</button>
        </form>

        <p></br></p>
        <h3>Vendor Details:</br></h3>
        <a href="allproductdetails.php">
            <button>Get Detials</button>
        </a>
        <p></br></p>
        <h3>Purchased History:</br></h3>
        <a href="purchasedhistory.php">
            <button>Get Detials</button>
        </a>
    </body>
</html>