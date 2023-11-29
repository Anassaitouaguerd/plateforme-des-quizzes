<?php
require_once "../connection.php";
if(isset($_POST['register_submit'])){
    extract($_POST);
    $sql_search = "SELECT * FROM user WHERE Email='$email'";
    if($conn->query($sql_search)->num_rows > 0){
        $_SESSION["message_error"]= "This Email adddress Alredy Exist!";
        header('location: register.php');
    }else{
        $pass_hash=MD5($password);
        $sql_insert = "INSERT INTO user SET Username='$name', Role=0, Password='$pass_hash', Email='$email'";
        $res=$conn->query($sql_insert);
        if($res){
            header('location: login.php'); 
        }
    }
    
}
if(isset($_POST["login_submit"])){
    extract($_POST);
    $pass_hash=MD5($password);
    $sql_search = "SELECT * FROM user WHERE Email='$email' AND Password='$pass_hash'";
    $res=$conn->query($sql_search);
    if($res){
        $user=$res->fetch_assoc();
        $_SESSION['roleUser']=$user['Role'];
        $_SESSION['id_user']=$user['UserID'];
        if($_SESSION['roleUser']==0){
            header('location: ../user/index.php'); 
        }
        if($_SESSION['roleUser']==1){
            header('location: index.php'); 
        }

    }
}
if(isset($_GET["log_out"])){
    session_destroy();
    header('location: login.php'); 
}