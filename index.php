<?php
require_once "connection.php";
// session_destroy();
if(!isset($_SESSION['id_user'])){
    header('location: admin/login.php');
}else{
    if($_SESSION["roleUser"]==0)
    header('location: user/index.php'); 
    if($_SESSION["roleUser"]==1)
    header('location: admin/index.php');
}
?>