<?php


// function pdo_connect_mysql(){
$dbname='sport_goods';
$host='localhost';
$username='root';
$pass='';





    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
 
?>