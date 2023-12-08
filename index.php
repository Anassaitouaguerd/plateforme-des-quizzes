<?php
require_once "connection.php";
session_destroy();
if(!isset($_SESSION['id_user'])){
    header('location: user/index.php');
}else{

    if($_SESSION['roleUser'] == 'etudiants')
        header('location: user/index.php');
    if($_SESSION['roleUser'] == 'admin')
        header('location: admin/index.php');
}
?>