<?php 
    $servername = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "lecoffee";

    try {
        $conn = new MySqli($servername, $userName, $password, $dbName);
    }
    Catch(Exception $e) 
    {
        echo "Connection Error". $e->getMessage();
        exit();
    }    
?>

