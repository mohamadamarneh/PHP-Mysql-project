<?php 

    $user ="root";
    $pass ="";
    $dbName = "sport_goods";
    $host = "localhost";

    try{
        $dsn = "mysql:host=$host;dbname=$dbName";
        $connect = new PDO ($dsn , $user , $pass);
        
    }
    catch (PDOException $e){
        die("failed connect to database , please connect your administrator");
    }
?>