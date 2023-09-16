<!DOCTYPE html> 
<html lang="en">
    <?php
        ini_set("display_errors", 1);
        ini_set("display_startup_errors", 1);
        error_reporting(E_ALL);
        require('readxml.php');
        if(isset($_POST["fileInput"]) == true) {
            $file = "../" .  $_POST["fileInput"];
            if(file_exists($file)) {
                $xmlData = simplexml_load_file($file) or die("Failed to Load Xml");
            }
        }
    ?> 
    <head>
        <title>NASA</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/main-style.css"></link>
        <script type="text/javascript" src="../js/myscript.js"></script>
    </head>
    <body>
        <header>

            <div class="logo-container">
                <img id="logo" src="../images/NASA_logo.svg.png" alt="image of nasa logo"></img>
            </div>
            
            <nav class="header-nav">
                <ul>
                    <li class="nav-link"><a href="#">Missions</a></li>
                    <li class="nav-link"><a href="#">Galleries</a></li>
                    <li class="nav-link"><a href="#">NASA TV</a></li>
                    <li class="nav-link"><a href="#">Follow NASA</a></li>
                    <li class="nav-link"><a href="#">Downloads</a></li>
                    <li class="nav-link"><a href="#">About</a></li>
                    <li class="nav-link"><a href="#">Nasa Audiences</a></li>
                </ul>
            </nav>

            <div class="search-box">
                <form action="" id="search-form">
                    <input type="text" value="" placeholder="Search">
                    <button value="submit"><img id="mag-image" src="../images/magnyfying4.png" alt="image of magnifying glass"></button>
                </form>
                
            </div>
            
        </header>
        <main>
            <section class="area-wrapper">
                <nav class="mini-nav">
                    <ul>
                        <li class="mini-link"><a href="#">Humans in Space</a></li>
                        <li class="mini-link"><a href="#">Moon to Mars</a></li>
                        <li class="mini-link"><a href="#">Earth</a></li>
                        <li class="mini-link"><a href="#">Space Tech</a></li>
                        <li class="mini-link"><a href="#">Flight</a></li>
                        <li class="mini-link"><a href="#">Solar System and Beyond</a></li>
                        <li class="mini-link"><a href="#">STEM Engagement</a></li>
                        <li class="mini-link"><a href="#">History</a></li>
                        <li class="mini-link"><a href="#">Benefits to You</a></li>
                    </ul>
                </nav>
            </section>
            <section class="area-wrapper">
                <div class="card large">
                    <img id="hero-image" class="large-image" src="../images/startimage.jpg" alt="image of astronaut">
                    <div class="text-description">
                        <h1 class="blue">Space Station</h1>
                        <h1 class="white">Expedition 48 Crew Lands Safely on Earth</h1>
                    </div>
                    
                </div>
                
            </section>
            <section class="area-wrapper">
                <div class="card">
                    <img class="small-image" src="<?php echo $xmlData->NewsPiece[0]->ImgUrl; ?>" alt="image of multiple people watching rocket">
                    <div class="text-description additional-text">
                        <h1 class="blue"><?= $xmlData->NewsPiece[0]->Title;?></h1>
                        <h1 class="white"><?php 
                            $sentences = explode(" ", $xmlData->NewsPiece[0]->Content);
                            for($i = 0; $i < 10; $i++) {
                                echo $sentences[$i] . " ";
                            }
                        ?></h1>
                        <p class="extra-info"><?= $xmlData->NewsPiece[0]->Content;?></p>
                    </div>
                </div>
                <div class="card">
                    <img class="small-image" src="<?php echo $xmlData->NewsPiece[1]->ImgUrl; ?>" alt="image of multiple astronauts">
                    <div class="text-description additional-text">
                        <h1 class="blue"><?= $xmlData->NewsPiece[1]->Title; ?></h1>
                        <h1 class="white"><?php
                            $sentences = explode(" ", $xmlData->NewsPiece[1]->Content);
                            for($i = 0; $i < 10; $i++) {
                                echo $sentences[$i] . " ";
                            }
                        ?></h1>
                        <p class="extra-info"><?= $xmlData->NewsPiece[1]->Content; ?></p>
                    </div>
                </div>
                <div class="card">
                    <img class="small-image" src="<?php echo $xmlData->NewsPiece[2]->ImgUrl; ?>" alt="image of multiple astronauts">
                </div>
                
                <div class="card small white-bg">
                    <div class="card-content">
                        <h2 class="blue-h2"><?= $xmlData->NewsPiece[2]->Title; ?></h2>
                        <p class="black-p"><?= $xmlData->NewsPiece[2]->Content; ?></p>
                    </div>
                </div>
            </section>
            <section class="area-wrapper">
                <div class="card small">
                    <iframe id="video" src="https://www.youtube.com/embed/zsJpUCWfyPE" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="card medium">
                    <img class="medium-image" src="../images/oceanworlds.jpg" alt="image of oceanworld">
                    <div class="text-description">
                        
                    </div>
                </div>
                <div class="card small black-bg">
                    <div class="card-content">
                        <h2 class="white-h2">Tweets</h2>
                        <p class="white-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ut.</p>
                        <p class="white-p">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi suscipit pariatur voluptatem deserunt, dolor saepe officiis labore eaque similique itaque.</p>
                        <p class="white-p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, soluta architecto. Modi placeat nisi labore dolores repellendus quod amet. Quod nulla incidunt dicta rerum, magnam voluptas eum accusantium, eos quas numquam temporibus ab laboriosam neque voluptates architecto error, consequuntur dolore. Excepturi qui saepe perferendis deleniti nobis nihil ipsam itaque pariatur!</p>
                    </div>    
                </div>
            </section>

            <div class="admin-container">
                <a class="admin-link" href="./admin.php">Link To Admin Page</a>
            </div>
        </main>

    </body>

</html>
