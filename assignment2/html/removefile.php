<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_erorrs", 1);
    error_reporting(E_ALL);

    if(file_exists("../store.json")) {
        unlink("../store.json");
        $data = [
            "file" => [
                [
                    "file-to-use" => "xd.xml"
                ]
            ]
        ];

        $jsonString = json_encode($data, JSON_PRETTY_PRINT);
        $filename = "../store.json";
        file_put_contents($filename, $jsonString);
        header("Location:./index.php");
    }
?>