<?php
    session_start();
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
    }
?>

<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/admin-style.css"></link>
        <title>NASA - Admin Page</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <?php 
            if(isset($_SESSION["username"])) {
                echo "<h1>" . "Welcome Back To " . $_SESSION["username"] . "</h1>";
            }
        ?>
        <form action="index.php" method="post"> 
            <label for="fileInput">Please enter an XML-file to replace the newspieces with!</label>
            <input id="fileInput" type="text" placeholder="Enter XML File" name="fileInput" required>
            <input type="submit" value="Apply">
        </form>

        <form action="reset-session.php">
            <input value="reset session" type="submit">
        </form>
    </body>
</html>