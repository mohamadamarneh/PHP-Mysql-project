<?php
include "../connect.php";

function email_check($email)
{
    global $connect;
    $login = "SELECT * FROM `userstable` where user_email='$email'";
    $result =$connect->query($login);
    $count = $result->rowCount();
    if ($count  > 0)
        return   true;
    else return false;;
}

function name_check($namePattern, $name)
{
    if (preg_match($namePattern, $name))
        return 1;
    else
        return 0;
}

function phone_check($phonePattern, $num)
{
    if (preg_match($phonePattern, $num))
        return 1;
    else
        return 0;
}

function pass_check($passPattern, $password)
{
    if (preg_match($passPattern, $password))
        return 1;
    else
        return 0;
}