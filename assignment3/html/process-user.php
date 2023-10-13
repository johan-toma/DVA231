<?php
    session_start();
    $db = new mysqli("localhost", "root", "", "assignment3db") or die("Could not connect");

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        if (empty($username) || empty($password)) {
            header("Location: ./login.php");
        }

        $query = "SELECT * FROM `admins` WHERE `Username`=? AND `Password`=?";
        $stmt = $db->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                header("Location: ./admin.php");
            }
        }
        else {
            header("Location: ./login.php");
        }
    }
    else {
        header("Location: ./login.php");
    }
?>
