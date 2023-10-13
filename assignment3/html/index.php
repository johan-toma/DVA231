<!DOCTYPE html>
<html lang="en">
    <?php 
        ini_set("display_errors", 1);
        ini_set("display_startup_erorrs", 1);
        error_reporting(E_ALL);
        session_start();

        $db = new mysqli("localhost","root","","assignment3db") or die("Could not connect");
        $query = "SELECT Title, Content, ImgUrl FROM `news` ORDER BY ID DESC LIMIT 3;";
        $stmt = $db->query($query);
        $titles = [];
        $contents = [];
        $imgurls = [];
        if($stmt->num_rows > 0) {
            $records = [];
            while($row = $stmt->fetch_assoc()) {
                $records[] = $row;
            }
            $i = 0;
            foreach($records as $record) {
                $titles[$i] = $record['Title'];
                $contents[$i] = $record['Content'];
                $imgurls[$i] = $record['ImgUrl'];
                $i++;
            }
        }
        
    ?>
  <head>
    <title>NASA</title>
    <meta charset="utf-8" />
    <meta name="" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css"></link>
    <script type="text/javascript" src="../js/myscript.js"></script>
    <!--<script type="text/javascript" src="../js/button-script.js"></script>-->
  </head>
  <body>

    <nav class="nav-container">
        <div class="logo-container"><a class="logo-a" href="index.php"><img class="logo" src="../images/NASA_logo.svg.png"></a></img></div>
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
        <div class="mini-nav">
            <li><a class="link" href="#">Humans in Space</a></li>
            <li><a class="link" href="#">Moon to Mars</a></li>
            <li><a class="link" href="#">Earth</a></li>
            <li><a class="link" href="#">Space Tech</a></li>
            <li><a class="link" href="#">Flight</a></li>
            <li><a class="link" href="#">Solar System and Beyond</a></li>
            <li><a class="link" href="#">Stem Engagement</a></li>
            <li><a class="link" href="#">History</a></li>
            <li><a class="link" href="#">Benefits to you</a></li>
        </div>
        
        <div class="grid-container">
            <div class="grid-area">
                <div class="card large">
                    <img id="hero-image" class="large-image" src="../images/startimage.jpg">
                    <div class="text-description">
                        <h1 class="blue">Space Station</h1>
                        <h1 class="white">Expedition 48 Crew Lands Safely on Earth</h1>
                    </div>
                </div>
            </div>
            <div class="grid-area">
                <div class="card">
                    <img class="small-image" src=<?php echo $imgurls[0];?>>
                    <div class="text-description additional-text">
                        <h1 class="blue"><?php echo $titles[0];?></h1>
                        <h1 class="white"><?php
                            $sentences = explode(" ", $contents[0]);
                            for($i = 0; $i < 12; $i++) {
                                echo $sentences[$i] . " ";
                            }
                        ?></h1>
                        <p class="extra-info"><?php echo $contents[0]?></p>
                    </div>
                </div>
            </div>
            <div class="grid-area">
                <div class="card">
                    <img class="small-image" src=<?php echo $imgurls[1];?>>
                    <div class="text-description additional-text">
                        <h1 class="blue"><?php echo $titles[1];?></h1>
                        <h1 class="white">
                            <?php
                                $sentences = explode(" ", $contents[1]);
                                for($i = 0; $i < 12; $i++) {
                                    echo $sentences[$i] . " ";
                                }
                            ?>
                        </h1>
                        <p class="extra-info"><?php echo $contents[1]?></p>
                    </div>
                </div>
            </div>
            <div class="grid-area">
                <div class="card">
                    <img class="small-image" src=<?php echo $imgurls[2];?> >
                </div>
            </div>
            <div class="grid-area">
                <div class="card white-bg">
                    <div class="card-content">
                        <h2 class="blue-h2"><?php echo $titles[2];?></h2>
                        <p class="black-p"><?php echo $contents[2];?></p>
                    </div>
                </div>
            </div>
            <div class="grid-area">
                <div class="card">
                    <iframe id="video" src="https://www.youtube.com/embed/zsJpUCWfyPE" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="grid-area">
                <div class="card medium">
                    <img class="medium-image" src="../images/oceanworlds.jpg">
                </div>
            </div>
            <div class="grid-area">
                <div class="card gray-bg">
                    <div class="card-content scroller">
                        <h2 class="white-h2">Tweets</h2>
                        <p class="white-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ut.</p>
                        <p class="white-p">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi suscipit pariatur voluptatem deserunt, dolor saepe officiis labore eaque similique itaque.</p>
                    </div>    
                </div>
            </div>
            <div class="grid-area">
              <a href="./login.php">Admin</a>
            </div>
        </form>
        </div>
        
    </main>
    <script type="text/javascript" src="../js/ajax_search.js"></script>
  </body>
</html>
