<!DOCTYPE html>
<html lang="en">
<?php 
        ini_set("display_errors", 1);
        ini_set("display_startup_erorrs", 1);
        error_reporting(E_ALL);
        session_start();

        $data="";

        if(isset($_GET["id"])) {
            $data = $_GET["id"];
        }

        $db = new mysqli("localhost","root","","assignment3db") or die("Could not connect");
        $query = "SELECT * FROM `news` WHERE ID = ?;";
        $statement = $db->prepare($query);

        $statement->bind_param("i", $data);
        if($statement->execute()) {
            $result = $statement->get_result();
            $row = $result->fetch_assoc();
            $title = $row["Title"];
            $content = $row["Content"];
            $imgurl = $row["ImgUrl"];
            $statement->close();
        }
        $db->close();
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NASA - News</title>
        <link rel="stylesheet" href="../css/fetch.css"></link>
        
    </head>
    <body>
    <nav class="nav-container">
        <div class="logo-container"><a href="index.php"><img class="logo" src="../images/NASA_logo.svg.png"></img></a></div>
        <ul>
            <li><a class="link" href="#">Missions</a></li>
            <li><a class="link" href="#">Galleries</a></li>
            <li><a class="link" href="#">NASA TV</a></li>
            <li><a class="link" href="#">Follow NASA</a></li>
            <li><a class="link" href="#">Downloads</a></li>
            <li><a class="link" href="#">About</a></li>
            <li><a class="link" href="#">NASA Audiences</a></li>
        </ul>
        <form>
            <input type="text" id="search-text" name="search-text" onkeyup="showResults(this.value)" placeholder="Search...">
            <button id="search-button" value="submit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
            <div id="search-box"></div>
        </form>
    </nav>
    <main>
        <div class="area-wrapper">
            <h1 class="title"><?php echo $title;?></h1>
            <img class="image-banner" src="<?php echo $imgurl;?>"></img>
            <p class="content"><?php echo $content;?></p>
        </div>
    </main>
    <script type="text/javascript" src="../js/ajax_search.js"></script>
    <!--<script type="text/javascript" src="../js/button-script.js"></script>-->
    </body>
</html>