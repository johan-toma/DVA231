<!DOCTYPE html>
<html lang="en">
    <?php 
        ini_set("display_errors", 1);
        ini_set("display_startup_erorrs", 1);
        error_reporting(E_ALL);
        session_start();

        if(isset($_POST["fileInput"])) {
            if(file_exists("../stored_data/" . $_POST["fileInput"])) {
                unlink("../stored_data/store.json");
                $jsonData = [
                    "file" => [
                         [
                            "file-to-use" => $_POST["fileInput"]
                         ]
                    ]
                ];
                $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
                $filename = "../stored_data/store.json";
                file_put_contents($filename, $jsonString);
            }
        }

        $storeFile = file_get_contents("../stored_data/store.json");
        $data = json_decode($storeFile, true);
        $loadData = $data["file"][0]["file-to-use"];
        $loadData = "../stored_data/" . $loadData;
        $xmlData = simplexml_load_file($loadData) or die("Failed to load XML-file");
        
    ?>
  <head>
    <title>NASA</title>
    <meta charset="utf-8" />
    <meta name="" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css"></link>
    <script type="text/javascript" src="../js/myscript.js"></script>
  </head>
  <body>

    <nav class="nav-container">
      <div class="logo-container"><img class="logo" src="../images/NASA_logo.svg.png"></img></div>
      <ul>
        <li><a href="#">Missions</a></li>
        <li><a href="#">Galleries</a></li>
        <li><a href="#">NASA TV</a></li>
        <li><a href="#">Follow NASA</a></li>
        <li><a href="#">Downloads</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">NASA Audiences</a></li>
      </ul>
      <div class="search-container">
        <form action="">
            <input type="text"></input>
            <button value="submit"><img id="mag-image" src="../images/magnyfying4.png"></button>
        </form>
      </div>
    </nav>

    <main>
        <div class="mini-nav">
            <li><a href="#">Humans in Space</a></li>
            <li><a href="#">Moon to Mars</a></li>
            <li><a href="#">Earth</a></li>
            <li><a href="#">Space Tech</a></li>
            <li><a href="#">Flight</a></li>
            <li><a href="#">Solar System and Beyond</a></li>
            <li><a href="#">Stem Engagement</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Benefits to you</a></li>
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
                    <img class="small-image" src=<?php echo $xmlData->NewsPiece->ImgUrl[0]?>>
                    <div class="text-description additional-text">
                        <h1 class="blue"><?php echo $xmlData->NewsPiece[0]->Title?></h1>
                        <h1 class="white"><?php
                            $sentences = explode(" ", $xmlData->NewsPiece[0]->Content);
                            for($i = 0; $i < 12; $i++) {
                                echo $sentences[$i] . " ";
                            }
                        ?></h1>
                        <p class="extra-info"><?php echo $xmlData->NewsPiece[0]->Content;?></p>
                    </div>
                </div>
            </div>
            <div class="grid-area">
                <div class="card">
                    <img class="small-image" src=<?php echo $xmlData->NewsPiece[1]->ImgUrl;?>>
                    <div class="text-description additional-text">
                        <h1 class="blue"><?php echo $xmlData->NewsPiece[1]->Title;?></h1>
                        <h1 class="white">
                            <?php
                                $sentences = explode(" ", $xmlData->NewsPiece[1]->Content);
                                for($i = 0; $i < 12; $i++) {
                                    echo $sentences[$i] . " ";
                                }
                            ?>
                        </h1>
                        <p class="extra-info"><?php echo $xmlData->NewsPiece[1]->Content;?></p>
                    </div>
                </div>
            </div>
            <div class="grid-area">
                <div class="card">
                    <img class="small-image" src=<?php echo $xmlData->NewsPiece[2]->ImgUrl;?> >
                </div>
            </div>
            <div class="grid-area">
                <div class="card white-bg">
                    <div class="card-content">
                        <h2 class="blue-h2"><?php echo $xmlData->NewsPiece[2]->Title;?></h2>
                        <p class="black-p"><?php echo $xmlData->NewsPiece[2]->Content?></p>
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
                    <div class="card-content">
                        <h2 class="white-h2">Tweets</h2>
                        <p class="white-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ut.</p>
                        <p class="white-p">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi suscipit pariatur voluptatem deserunt, dolor saepe officiis labore eaque similique itaque.</p>
                        <p class="white-p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, soluta architecto. Modi placeat nisi labore dolores repellendus quod amet. Quod nulla incidunt dicta rerum, magnam voluptas eum accusantium, eos quas numquam temporibus ab laboriosam neque voluptates architecto error, consequuntur dolore. Excepturi qui saepe perferendis deleniti nobis nihil ipsam itaque pariatur!</p>
                    </div>    
                </div>
            </div>
            <div class="grid-area">
              <a href="./login.php">Admin</a>
            </div>
        </form>
        </div>
    </main>
  </body>
</html>
