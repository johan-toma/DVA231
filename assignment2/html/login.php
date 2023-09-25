<?php
    session_start();
    //header('Location:./admin.php');
?>

<html lang="en">
    <head>
        <title>NASA - Admin Login</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/login-style.css"></link>
    </head>
    <body>
        <?php
            if(isset($_SESSION["username"]) && isset($_SESSION["password"])) {
                header('Location:./admin.php');
            }
        ?>
        <form action="admin.php" method="post">
            <label for="username">Enter your Username</label>
            <input placeholder="Username..." type="text" id="username" name="username">
            <label for="password">Enter your Password</label>
            <input placeholder="Password..." type="password" id="password" name="password">
            <input type="submit" value="Login">
        </form>
    </body>
</html>