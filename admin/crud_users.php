<?php
require "../connection.php";
if(isset($_POST['save_user'])){
    $name_user = $_POST['name_user'];
    $email_user = $_POST['email_user'];
    $role_user = $_POST['role_user'];
    $pss_user = MD5($_POST['pass_user']);
    $SQL_ISERT_USERS = "INSERT INTO users (username, email, passwordHash, `role`) VALUES ('$name_user' , '$email_user' , '$pss_user ' , '$role_user')";
    $result_isert = mysqli_query($conn,$SQL_ISERT_USERS);
    if($result_isert){
        header('location:utlisateurs.php');
    }
}
else if(isset($_POST['update_user'])){
    $id_user = $_POST['id_user'];
    $name_user = $_POST['name_user'];
    $email_user = $_POST['email_user'];
    $role_user = $_POST['role_user'];
    $pss_user = MD5($_POST['pass_user']);
    $SQL_UP_USERS = "UPDATE users SET username = '$name_user', email = '$email_user', passwordHash = '$pss_user ', `role` = '$role_user' WHERE userID = $id_user";
    $result_UP = mysqli_query($conn,$SQL_UP_USERS);
    if($result_UP){
        header('location:utlisateurs.php');
    }
}
else if(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];
    $SQL_DELET_USER = "DELETE FROM users WHERE userID = $id_user";
    $result_delet = mysqli_query($conn,$SQL_DELET_USER);
    if($result_delet){
        header('location:utlisateurs.php');
    }
}

?>