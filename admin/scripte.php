<?php
session_start();
require_once "../connection.php";
if(isset($_POST['register_submit'])){
    extract($_POST);

    $sql_search = "SELECT * FROM users WHERE email='$email'";
    if($conn->query($sql_search)->num_rows > 0){
        $_SESSION["message_error"]= "This Email adddress Alredy Exist!";
        header('location: register.php');
    }else{
        $pass_hash=MD5($password);

        $sql_insert = "INSERT INTO users SET username='$name', email='$email' , passwordHash='$pass_hash' , `role`='etudiants'";

        $res=$conn->query($sql_insert);
        if($res){
            header('location: login.php'); 
        }
    }
    
}
if(isset($_POST['login_submit'])){
    extract($_POST);
    $pass_hash=MD5($password);
    $sql_search = "SELECT * FROM users WHERE email='$email' AND passwordHash='$pass_hash'";
    

    $res=$conn->query($sql_search);
    if($res){
        $user=$res->fetch_assoc();
        $_SESSION['roleUser']=$user['role'];
        $_SESSION['usename']=$user['username'];
        $_SESSION['id_user']=$user['userID'];


        if($user['role']=="etudiants"){
            header('location:../user/index.php'); 
        }
        if($user['role']=="admin"){

            header('location: index.php'); 
        } 

    }
}
if(isset($_GET["log_out"])){
    session_destroy();
    header('location: login.php'); 
}