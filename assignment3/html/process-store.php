<?php 
    $db = new mysqli("localhost", "root", "", "assignment3db") or die("Database error: " . mysqli_connect_errno());
    $filename = $_POST["fileInput"];
    
    if (isset($filename)) {
        $dir = "../stored_data/";
        $file = $dir . $filename;
        $xmlData = simplexml_load_file($file);
    
        foreach($xmlData->NewsPiece as $news) {
            $title = $news->Title;
            $content = $news->Content;
            $imgurl = $news->ImgUrl;
            $insert_sql = "INSERT INTO news(Title, Content, ImgUrl) VALUES (?, ?, ?)";
            $stmt = $db->prepare($insert_sql);
            if($stmt) {
                $stmt->bind_param("sss", $title, $content, $imgurl);
                $stmt->close();
            }
            
        }
        
    }
    
    header("Location: ./index.php");
    
?>