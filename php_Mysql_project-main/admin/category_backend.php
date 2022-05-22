<?php 
require "../connect.php";
function add_category ($connect , $category_name , $category_image){
    $sql_insert_category = "INSERT INTO categories (category_name , category_image) VALUES (:name , :image)
    
    ";

    $stat = $connect->prepare($sql_insert_category);
    $stat->execute([
        ':name'=>$category_name, 
        ':image'=>$category_image
    ]);
}

function select_category($connect){
    $sql_select = "SELECT * FROM categories";
    $stat = $connect->query($sql_select);
    $row = $stat->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}

function select_one_category($connect ,$id){
    $sql_select = "SELECT * FROM categories WHERE category_id = '$id'" ;
    $stat = $connect->query($sql_select);
    $row = $stat->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function update_category($connect ,$name ,$image, $id){
    $sql_update = "UPDATE categories SET category_name=:name,category_image=:image WHERE category_id = '$id'";
    $stat = $connect->prepare($sql_update);
    $stat->execute([
        ":name"=>$name,
        ":image"=>$image
    ]);
}

function delete_category($connect , $id){
    $sql_delete = "DELETE FROM categories WHERE category_id = :id";
    $stat = $connect->prepare($sql_delete);
    $stat->execute([
        ":id"=>$id
    ]);
}

// Admin function 

function add_admin($connect ,$name , $email , $pass ){
    $sql_add = "INSERT INTO admin (admin_name , admin_email , admin_password) VALUES (:name , :email , :pass)";
    $stat = $connect->prepare($sql_add);
    $stat->execute([
        ":name"=>$name,
        ":email"=>$email,
        ":pass"=>$pass
    ]);
}

function view_one_admin($connect , $id){
    $sql_select = "SELECT * FROM admin WHERE admin_id = '$id'" ;
    $stat = $connect->query($sql_select);
    $row = $stat->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function view_all_admin($connect){
    $sql_select = "SELECT * FROM admin" ;
    $stat = $connect->query($sql_select);
    $row = $stat->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}

function delete_admin($connect , $id){
    $sql_delete = "DELETE FROM admin WHERE admin_id = :id";
    $stat = $connect->prepare($sql_delete);
    $stat->execute([
        ":id"=>$id
    ]);
}

function update_admin($connect ,$name ,$email, $password , $id){
    $sql_update = "UPDATE admin SET admin_name=:name,admin_email=:email , admin_password = :pass WHERE admin_id = '$id'";
    $stat = $connect->prepare($sql_update);
    $stat->execute([
        ":name"=>$name,
        ":email"=>$email,
        ":pass"=>$password
    ]);
}

?>