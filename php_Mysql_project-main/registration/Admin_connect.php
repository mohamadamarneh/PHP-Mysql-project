<?php
include "../connect.php";

$full_up = 0;
$email;
$password;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    global $error_signup, $full_up;
    include "connect.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email != '' && $password != '') {

        $login = "SELECT * FROM `admin` where admin_email='$email' and admin_password='$password'";
        $result = $pdo->query($login);
        $user = $result->fetch();
        $count = $result->rowCount();
        if ($count != 0) {

            header('location: ../admin/index.php');
        } else {
          //  echo "login faild";
        }
    } else {
        $full_up = 1;
    }
}
