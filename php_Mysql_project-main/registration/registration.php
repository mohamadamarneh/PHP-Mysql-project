<?php

include "fun.php";
include "../connect.php";
session_start();

$_SESSION['full_up'] = 0;;



$name;
$email;
$address;
$num;
$password;
$conferm;

$passPattern = "/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/ ";
// Must be a minimum of 8 characters
// Must contain at least 1 number
// Must contain at least one uppercase character
// Must contain at least one lowercase character

$namePattern =  "/^[a-z ]+$/i ";

$phonePattern = "/[07]{2,3}[7-9]{1,2}[0-9]{7,8}/ ";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $button = $_POST['btn'];
    if (isset($button) && $button == "Sign-up") {


        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $num = $_POST["num"];
        $password = $_POST["password"];
        $conferm = $_POST["conferm"];

        if ($name != '' && $email != '' && $password != '' && $conferm != '' && $address != '' && $num != '') {
            if (!email_check($email) && name_check($namePattern, $name) && phone_check($phonePattern, $num) && pass_check($passPattern, $password) && $conferm == $password) {

                $insertUser = "INSERT INTO `userstable` (user_name, user_address, user_email, user_password, user_phone) VALUES ('$name', '$address', '$email', '$password', '$num');";
                // injection
                $result = $connect->prepare($insertUser);
                $result->execute([':user_name' => $name, ':user_address' => $address, ':user_email' => $email, ':user_password' => $password, ':user_phone' => $num]);
                if ($result) {
                    header('location:login.php');
                    $email = "";
                }
            }
        } else {
            if (isset($_SESSION['full_up'])) {
                $_SESSION['full_up'] = 1;
            }
        }
    }


    //***************************************************************************************************************************** */


    else {

        global $error_sign, $full_up;
        include "connect.php";

        $email = $_POST["email"];
        $password = $_POST["password"];

        //echo  $email, $password;

        if ($email != '' && $password != '') {

            $login = "SELECT * FROM `userstable` where user_email='$email' and user_password='$password'";
            $result = $connect->query($login);
            $user = $result->fetch();
            $count = $result->rowCount();
            if ($count != 0) {

                $insertUser = "UPDATE `userstable` SET flage ='1' WHERE user_email = '$email';";
                // injection
                $result = $connect->prepare($insertUser);
                $result->execute([':user_email' => $email]);
                if ($result) {

                    $login = "SELECT user_id  FROM `userstable` where user_email='$email' and user_password='$password'";
                    $result = $connect->query($login);
                    $user = $result->fetch();

                    $_SESSION['user_id '] = $user['user_id'];
                    header('location: ../home.php');
                } else {
                    echo "faild login";
                }
            }
        } else {
            if (isset($_SESSION['full_up'])) {
                $_SESSION['full_up'] = 1;
              }
        }
    }
}