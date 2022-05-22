<?php

    $servername = "localhost";
    $database = "sport_goods";
    $username = "root";
    $password = "";
    
     $dsn = "mysql:host=$servername;dbname=$database";
    
    try {
        $pdo = new PDO($dsn, $username, $password);
    
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


?>