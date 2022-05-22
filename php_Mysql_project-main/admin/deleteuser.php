<?php 
$user="root";
$password="";
$pdo=new PDO('mysql:host=localhost;dbname=sport_goods',$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id = $_POST["id"] ?? null;
if(!$id){
    header('location: users.php');
    exit;

}
$adding =$pdo->prepare('DELETE FROM userstable WHERE user_id = :id ');
$adding->bindValue(':id',$id);
$adding->execute();

header('location: users.php'); 
?>