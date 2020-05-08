<?php
try{
    $connection = new PDO("mysql:host=localhost;dbname=human","PDO","thomas");
    /*if ($connection){
        echo "I connected the human database!";
    }*/
}

catch(PDOException $e){
    echo "Failed to connect to database: <BR>";
    echo $e->getMessage();
}

//$connection = NULL;

?>