<?php
    session_start();
    
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
                echo "<h1>" . "Hello,  " . $_SESSION["username"] . "</h1>";
            }
        ?>
        <form action="process-store.php" method="post"> 
            <label for="fileInput">Please enter an XML-file to replace the newspieces with!</label>
            <input id="fileInput" type="file" placeholder="Enter XML File" name="fileInput" accept="text/xml, application/xml"required>
            <input type="submit" value="Apply">
        </form>
        <form action="reset-session.php">
            <input value="reset session" type="submit">
    </body>
</html>