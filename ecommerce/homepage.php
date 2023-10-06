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
        <form action="serverside\signuppage.inc.php" method="post">
            <label for="username">Username</label>
            <input required id="username" type="text" name="username" placeholder="Enter Username">
            </br>
            <label for="password">Password</label>
            <input required id="password" type="password" name="password" placeholder="Enter Passwod">
            </br>
            <label for="email">Email</label>
            <input required id="email" type="text" name="email" placeholder="Enter Email">
            </br>            
            <button type="submit">Submit</button>
            </br>
        </form>

        <?php
        
            checkSignUpErrors();

        ?>

        <h4>Login</h4>
        <form action="serverside\loginpage.inc.php" method="post">
            <label for="username">Username</label>
            <input required id="username" type="text" name="username" placeholder="Enter Username">
            </br>
            <label for="password">Password</label>
            <input required id="password" type="password" name="password" placeholder="Enter Passwod">
            </br>           
            <button type="submit">Submit</button>
            </br>
        </form>

        <?php
        
            checkLoginErrors();

        ?>

    </body>
</html>