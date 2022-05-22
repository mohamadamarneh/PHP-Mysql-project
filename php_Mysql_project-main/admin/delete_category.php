
<?php 
require "category_backend.php";
$id=$_POST["delete"];
echo $id;
// if(!$id){
//     header('location: view.php');
//     exit;
// }
delete_category($connect , $id);

// header('location:view.php'); 
?>