<?php
    $db = mysqli_connect("localhost", "root", "", "assignment3db") or die(mysqli_connect_errno());
    $data = "";
    if (isset($_GET["q"])) {
        $data = $_GET["q"];
    }

    $query = "SELECT * FROM `news` WHERE UPPER(Title) LIKE UPPER(?) OR UPPER(Content) LIKE UPPER(?)";
    
    if ($statement = $db->prepare($query)) {
        $param = "%$data%";
        $statement->bind_param("ss", $param, $param);
        
        if ($statement->execute()) {
            $result = $statement->get_result();
            $results = array();
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }

            echo json_encode($results);
        } 
        $statement->close();
    } 

    $db->close();
?>
