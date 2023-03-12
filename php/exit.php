<?php

session_start();

require_once "db.php";





$login =  $_SESSION['loginName'];
$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_SESSION['online']))
{
    unset($_SESSION['online']);
}
if(isset($_SESSION['loginName']))
{
    unset($_SESSION['loginName']);
}


$result = mysqli_query($con, "UPDATE `remember_device` SET `open` = 0  WHERE `login` = '$login' AND `ip` = '$ip' ");



header("Location: ../index.php");

?>